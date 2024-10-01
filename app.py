import sys
import json
import gensim
import os

def main():
    try:
        # รับข้อมูลเส้นทางของโมเดลและเกรดจาก command line arguments
        model_path = sys.argv[1]
        grades_json = sys.argv[2]

        # แปลง JSON ที่ส่งมาจาก Laravel ให้เป็น dictionary
        grades = json.loads(grades_json)

        # ตรวจสอบการมีอยู่ของโมเดล
        try:
            # โหลดโมเดล Doc2Vec
            model = gensim.models.Doc2Vec.load(model_path)
        except FileNotFoundError:
            raise Exception(f"Model file not found at path: {model_path}")
        except Exception as e:
            raise Exception(f"Error loading model: {str(e)}")

        # ฟังก์ชันแปลงเกรดเป็นเวกเตอร์ที่เหมาะสมสำหรับโมเดล
        def process_grade(grade):
            # แปลงเกรดเป็นคะแนน เช่น A = 4, B = 3, C = 2, D = 1, F = 0
            grade_mapping = {'A': 4.0, 'B+':3.5, 'B': 3, 'C+':2.5, 'C': 2,'D+':1.5, 'D': 1, 'F': 0}
            return grade_mapping.get(grade.upper(), 0)

        # แปลงเกรดเป็นเวกเตอร์
        input_vector = [process_grade(grade) for grade in grades.values()]

        # ใช้โมเดลในการแนะนำอาชีพ
        try:
            recommended_careers = model.dv.most_similar([input_vector], topn=3)
            career_ids = [career[0] for career in recommended_careers]
        except Exception as e:
            raise Exception(f"Error during career recommendation: {str(e)}")

        # กำหนดเส้นทางของไฟล์ mapping
        script_dir = os.path.dirname(os.path.realpath(__file__))
        mapping_file_path = os.path.join(script_dir, 'career_mapping.json')

        # โหลดไฟล์ mapping ระหว่างรหัสอาชีพและชื่ออาชีพ
        try:
            with open(mapping_file_path, 'r') as f:
                career_mapping = json.load(f)
        except FileNotFoundError:
            raise Exception(f"Career mapping file not found at path: {mapping_file_path}")
        except json.JSONDecodeError:
            raise Exception("Error decoding career mapping JSON.")

        # แปลงรหัสอาชีพให้เป็นชื่ออาชีพ
        result = []
        for career_id in career_ids:
            if career_id in career_mapping:
                result.append(career_mapping[career_id])
            else:
                result.append(f"Unknown career for ID: {career_id}")
                print(f"Warning: Career ID {career_id} not found in mapping.")

    except json.JSONDecodeError:
        result = {"error": "Invalid JSON format for grades."}
    except IndexError:
        result = {"error": "Missing arguments: model_path and/or grades."}
    except Exception as e:
        result = {"error": str(e)}

    # ส่งผลลัพธ์กลับไปยัง Laravel
    print(json.dumps(result))

if __name__ == "__main__":
    main()