import sys
import json
import gensim
import numpy as np
from sklearn.metrics.pairwise import cosine_similarity

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
        
        # ฟังก์ชัน preprocess_text ที่จะใช้ในการเตรียมข้อมูล
        def preprocess_text(text):
            return text.lower().replace('_', ' ').strip()

        # ฟังก์ชันแปลงเกรดเป็นข้อความ
        def grade_to_number(grade):
            if grade == 'A':
                return 4.0
            elif grade == 'B+':
                return 3.5
            elif grade == 'B':
                return 3.0
            elif grade == 'C+':
                return 2.5
            elif grade == 'C':
                return 2.0
            elif grade == 'D+':
                return 1.5
            elif grade == 'D':
                return 1.0
            elif grade == 'F':
                return 0.0
            else:
                return None

        # แปลงเกรดเป็นค่าตัวเลข (Normalization)
        user_grades = {course: grade_to_number(grade) for course, grade in grades.items()}
        user_grades = {course: grade for course, grade in user_grades.items() if grade is not None}

        # เตรียมข้อมูลผู้ใช้จากเกรด
        processed_user_grades = {preprocess_text(course): grade for course, grade in user_grades.items()}

        # สร้างเวกเตอร์ของผู้ใช้จากเกรดที่กรอก
        user_vectors = [model.infer_vector(course.split()) * grade for course, grade in processed_user_grades.items()]
        if len(user_vectors) > 0:
            user_vector = np.mean(user_vectors, axis=0)
        else:
            user_vector = np.zeros(model.vector_size)

        # สร้างเวกเตอร์ของอาชีพทั้งหมดจากแท็กที่เคยสร้างตอนเทรนโมเดล
        career_tags = model.dv.index_to_key
        career_vectors = [model.dv[tag] for tag in career_tags]

        # คำนวณความคล้ายคลึงระหว่างเวกเตอร์ของผู้ใช้และเวกเตอร์ของอาชีพทั้งหมด
        similarities = cosine_similarity([user_vector], career_vectors)[0]

        # เรียงลำดับอาชีพตามความคล้ายคลึงและเลือก 3 อันดับแรก
        top_indices = similarities.argsort()[-3:][::-1]
        top_careers = [career_tags[i] for i in top_indices]

        # แผนที่ชื่อแท็กกลับไปยังชื่ออาชีพที่แท้จริงจาก JSON ที่ให้มา
        career_mapping = {
            "career_1": "System Engineer",
            "career_2": "System Analyst",
            "career_3": "Machine Learning Engineer",
            "career_4": "Network Engineer",
            "career_5": "Cybersecurity",
            "career_6": "Data Analyst",
            "career_7": "Database Engineer",
            "career_8": "Full Stack Developer",
            "career_9": "Tester (Software Tester/QA Engineer)",
            "career_10": "Web Developer",
            "career_11": "UX/UI Designer",
            "career_12": "Graphic Designer",
            "career_13": "Software Developer",
            "career_14": "Software Engineer",
            "career_15": "IT Support",
            "career_16": "IT Project Manager",
            "career_17": "Help Desk Technician",
            "career_18": "DevOps Engineer",
            "career_19": "Computer Science Teacher",
            "career_20": "IT Administrative Officer"
        }

        # แปลงแท็กให้เป็นชื่ออาชีพ
        human_readable_careers = [career_mapping.get(career, career) for career in top_careers]

        # ส่งผลลัพธ์กลับไปยัง Laravel (ส่ง top careers)
        result = human_readable_careers

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
