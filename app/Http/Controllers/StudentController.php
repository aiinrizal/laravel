<?php


namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\Shared\ZipArchive;
use PhpOffice\PhpWord\TemplateProcessor;
//use PhpOffice\PHPWord\TemplateProcessor;
//require_once 'vendor/autoload.php';
//$templateProcessor = new \PhpOffice\PhpWord\templateProcessor();

class StudentController extends Controller
{
public function index()
{
    $students = Student::latest()->paginate(15);
    return view('students.index',compact('students'))
        ->with('i', (request()->input('page', 1) -1) *5);
}

public function create()
{
    return view('students.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'course' => 'required',
        'fee' => 'required',

    ]);

    header("Content-type: application/vnd.ms-word");  
    header("Content-Disposition: attachment;Filename=".rand().".doc");  
    header("Pragma: no-cache");  
    header("Expires: 0");  
    echo '<h1>'.$_POST["student"].'</h1>';  
    echo $_POST["student"];

    Student::create($request->all());

    return redirect()->route('students.index')
        ->with('success', 'Added successfully');
}

public function show ($id)
{
    $student = Student::findOrFail($id);
    return view('students.show', compact('student'));
}

public function edit(Student $student)
{
    return view('students.edit', compact('student'));
}

public function update(Request $request, Student $student)
{
    $request->validate([

    ]);

    $student->update($request->all());

    return redirect()->route('students.index')
        ->with('success','Updated');
}

public function destroy(Student $student)
{
    $student->delete();

    return redirect()->route('students.index')
        ->with('success','Deleted');
}

public function wordExport($id)
{
    $student = Student::findOrFail($id);
    $templateProcessor = new TemplateProcessor('/Applications/MAMP/htdocs/startup/public/word-template/student.docx');
    $templateProcessor->setValue('id', $student ->id);
    $templateProcessor->setValue('name', $student ->name);
    $templateProcessor->setValue('course', $student ->course);
    $templateProcessor->setValue('fee', $student ->fee);
    $fileName = $student->name;
    $templateProcessor->saveAs( $fileName .'.docx');
    return response()->download( $fileName .'.docx')->deleteFileAfterSend(true);

}


}
 