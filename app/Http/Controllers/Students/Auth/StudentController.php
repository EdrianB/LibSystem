<?php
namespace App\Http\Controllers\Students\Auth;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;



class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $student = Auth::guard('student')->user();
        //dd($student->image);
        toastr()->info("Login successfull");
        return view('Students.dashboard',compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Students.auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'fullname' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:students',
                'password' => 'required|string|min:8',
                'student_no' => 'required|string|unique:students',
                'image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:5020',
                'program' => 'required|string|max:255',
            ]);
        } catch (ValidationException $e) {
            // If validation fails, redirect back with errors
            toastr()->error("Some error happens");
            return redirect()->back()->withErrors($e->validator->getMessageBag())->withInput();
        }
    
        // Hash the password
        $validatedData['password'] = Hash::make($validatedData['password']);
    
        
        if ($request->hasFile('image')) {
            
            $profilePictureName = time().'.'.$request->image->getClientOriginalExtension();
    
            $request->image->move(public_path('images'), $profilePictureName);
    
            $validatedData['image'] = 'images/' . $profilePictureName;
        }
    
        // Create a new student record
        $student = Student::create($validatedData);  

        return view('Students.auth.login')->with('success', 'Registration successful. Please login.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
