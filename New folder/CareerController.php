<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CareerController extends Controller
{
    public function index()
    {
        // รายวิชาที่ใช้ในฟอร์ม
        $courses = ['Programming', 'Data Structures', 'Database Management', 'Web Development'];
        return view('career_form', compact('courses'));
    }

    public function recommend(Request $request)
    {
        // รับข้อมูลเกรดจากแบบฟอร์ม
        $grades = $request->input('grades');
        
        // เรียกใช้ฟังก์ชันแนะนำอาชีพ และส่งข้อมูลเกรดไปให้
        $recommendedCareers = $this->getCareerRecommendations($grades);
        
        // ส่งผลลัพธ์ไปยัง View เพื่อนำไปแสดง
        return view('career_result', compact('recommendedCareers'));
    }

    private function getCareerRecommendations($grades)
    {
        // เส้นทางไปยังไฟล์โมเดลและ Python script
        $pythonPath = 'C:/Users/ASUS/AppData/Local/Programs/Python/Python311/python.exe'; // เปลี่ยนเป็น '/'
        $scriptPath = base_path('app.py'); // ใช้ base_path() สำหรับตำแหน่งไฟล์ Python script
        $modelPath = storage_path('models/career_recommendation (3).model'); // ใช้ storage_path() สำหรับตำแหน่งไฟล์โมเดล
    
        
        // แปลงข้อมูลเกรดเป็น JSON
        $gradesJson = json_encode($grades, JSON_UNESCAPED_SLASHES);
    
        // ตรวจสอบข้อมูล JSON ที่ส่งไปให้ Python script
        Log::info('JSON being sent to Python: ' . $gradesJson);
    
        // สร้างคำสั่งเพื่อเรียกใช้ Python และส่งข้อมูลที่จำเป็น
        $command = escapeshellcmd($pythonPath) . ' ' . escapeshellarg($scriptPath) . ' ' . escapeshellarg($modelPath) . ' ' . '"' . addslashes($gradesJson) . '"';
        Log::info('Executing command: ' . $command);
    
        // รันคำสั่ง Python และรับผลลัพธ์กลับมา
        $output = shell_exec($command);
    
        // ตรวจสอบผลลัพธ์
        if ($output === null || trim($output) === '') {
            Log::error('Failed to execute Python script or no output returned.');
            return ["error" => "Failed to execute Python script."];
        }
    
        Log::info('Python script output: ' . $output);
    
        // แปลงผลลัพธ์ที่ได้จาก Python script
        $result = json_decode($output, true);
    
        if ($result === null) {
            Log::error('Failed to decode JSON from Python output: ' . json_last_error_msg());
            return ["error" => "Failed to decode JSON from Python output."];
        }
    
        if (isset($result['error'])) {
            Log::error('Python error: ' . $result['error']);
            return ["error" => "Python error: " . $result['error']];
        }
    
        return $result;
    }
}