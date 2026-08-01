<?php
namespace App\Http\Controllers;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\Response;
use App\Mail\OtpMail;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Scholarship;
use App\Models\ScholarshipApplication;
use Illuminate\Support\Facades\Session;
use App\Models\SosRequest;
use App\Mail\SosMail;
use App\Models\Admin;
use App\Models\Complaint;
use App\Models\Event;
use App\Models\HealthInfo;
use App\Models\Placement;
use App\Models\HostelComplaint;
use App\Models\HostelLeave;
use App\Models\VisitorPass;
use App\Models\MedicalCard;


class AuthController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }
public function sendOtp(Request $request)
{

    $request->validate([
        'email'=>'required|email'
    ]);


    $student = Student::where('email',$request->email)->first();
    session([
    'student_id' => $student->id,
    'student_email' => $student->email
]);


    if(!$student)
    {
        return response()->json([
            'status'=>false,
            'message'=>'Email Not Registered'
        ]);
    }


    $otp = rand(100000,999999);


    session([
        'login_email'=>$request->email,
        'login_otp'=>$otp
    ]);


    try
    {

        Mail::to($request->email)
        ->send(new OtpMail($otp));


        return response()->json([
            'status'=>true,
            'message'=>'OTP Sent Successfully'
        ]);

    }
    catch(\Exception $e)
    {

        return response()->json([
            'status'=>false,
            'message'=>$e->getMessage()
        ]);

    }


}
    
    public function verifyLogin(Request $request)
{
    $request->validate([
        'email'=>'required|email',
        'password'=>'required',
        'otp'=>'required'
    ]);

    $student = Student::where('email',$request->email)->first();

    if(!$student)
    {
        return back()->with('error','Email not found');
    }

    if(!Hash::check($request->password,$student->password))
    {
        return back()->with('error','Wrong Password');
    }

    if(session('login_email') != $request->email ||
       session('login_otp') != $request->otp)
    {
        return back()->with('error','Invalid OTP');
    }

    session([
        'student_id'=>$student->id,
        'student_login'=>true
    ]);

    return redirect('/dashboard')
            ->with('success','Login Successful');
}

public function forgotPassword()
{
    return view('auth.reset-password');
}

public function sendResetLink(Request $request)
{
    $request->validate([
        'email' => 'required|email'
    ]);

    $student = Student::where('email', $request->email)->first();

    if (!$student) {
        return back()->with('error', 'Email Not Found');
    }

    session([
        'reset_email' => $request->email
    ]);

    return redirect()
        ->route('reset.password')
        ->with('success', 'Please create your new password.');
}

public function resetPassword()
{
    return view('auth.reset-password');
}

public function updatePassword(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|confirmed|min:6',
    ]);

    $student = Student::where('email', $request->email)->first();

    if (!$student) {
        return back()->with('error', 'Student not found.');
    }

    $student->password = Hash::make($request->password);
    $student->save();

    session()->forget('reset_email');

    return redirect()
        ->route('login')
        ->with('success', 'Password Updated Successfully. Please Login.');
}

    public function dashboard()
    {
        return view('auth.dashboard');
    }
    public function register()
{
    return view('auth.register');
}

public function storeRegister(Request $request)
{
    try {

        $request->validate([
            'name'=>'required',
            'register_no' => 'required',
            'department'=>'required',
            'year'=>'required',
            'email'=>'required|email|unique:students',
            'parent_email' => 'required|email',
            'parent_phone' => 'required|digits:10',
            'phone'=>'required',
            'address'=>'required',
            'hostel_status'=>'required',
            'photo'=>'required|image|mimes:jpg,jpeg,png|max:2048',
            'password'=>'required|min:6|confirmed'
        ]);

        $photoName = time().'.'.$request->photo->extension();

        $request->photo->move(public_path('uploads'), $photoName);

        Student::create([
            'name'=>$request->name,
            'register_no'=>$request->register_no,
            'department'=>$request->department,
            'year'=>$request->year,
            'email'=>$request->email,
            'parent_email' => $request->parent_email,
            'parent_phone' => $request->parent_phone,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'hostel_status'=>$request->hostel_status,
            'photo'=>$photoName,
            'password'=>Hash::make($request->password)
        ]);

        return redirect('/login')->with('success','Registration Successful');

    } catch (\Exception $e) {

        dd($e->getMessage());

    }
}
public function profile()
{
    $student = Student::find(session('student_id'));

    return view('auth.profile', compact('student'));
}
public function updateProfile(Request $request)
{
    $student = Student::find(session('student_id'));

    if(!$student)
    {
        return back()->with('error','Student Not Found');
    }

    $request->validate([
        'name'=>'required',
        'phone'=>'required',
        'address'=>'required',
        'photo'=>'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    if($request->hasFile('photo'))
    {
        if($student->photo &&
           file_exists(public_path('uploads/'.$student->photo)))
        {
            unlink(public_path('uploads/'.$student->photo));
        }

        $photoName=time().'.'.$request->photo->extension();

        $request->photo->move(public_path('uploads'),$photoName);

        $student->photo=$photoName;
    }

    $student->name=$request->name;
    $student->phone=$request->phone;
    $student->address=$request->address;

    $student->save();

    return redirect()
            ->route('profile')
            ->with('success','Profile Updated Successfully');
}
public function sos()
{

    $studentId = session('student_id');


    $student = Student::find($studentId);



    $sosHistory = SosRequest::where(
        'student_id',
        $studentId
    )
    ->latest()
    ->get();



    return view('auth.sos',
    compact(
        'student',
        'sosHistory'
    ));

}
public function sendSos(Request $request)
{

    $request->validate([

        'location'=>'required',

        'message'=>'required'

    ]);

    $student = Student::find(session('student_id'));

    SosRequest::create([

        'student_id'=>$student->id,

        'location'=>$request->location,

        'message'=>$request->message,

        'status'=>'Pending'

    ]);

    Mail::to(env('WARDEN_EMAIL'))
    ->send(new SosMail(
        $student,
        $request->location,
        $request->message
    ));

Mail::to($student->parent_email)
    ->send(new SosMail(
        $student,
        $request->location,
        $request->message
    ));

    return back()->with(
        'success',
        'SOS Alert Sent Successfully'
    );

}
public function adminSos()
{
    $sosRequests = SosRequest::with('student')
                    ->latest()
                    ->get();

    return view('auth.admin-sos', compact('sosRequests'));
}

public function updateSosStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required'
    ]);

    $sos = SosRequest::findOrFail($id);

    $sos->status = $request->status;

    $sos->save();

    return redirect()->route('admin.sos')
                     ->with('success', 'SOS Status Updated Successfully');
}
public function adminLogin()
{
    return view('auth.admin-login');
}

public function verifyAdminLogin(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $admin = Admin::where('email', $request->email)->first();

    if (!$admin) {
        return back()->with('error', 'Admin Not Found');
    }

    if (!Hash::check($request->password, $admin->password)) {
        return back()->with('error', 'Invalid Password');
    }

    session([
        'admin_id' => $admin->id,
        'admin_login' => true
    ]);

    return redirect()->route('admin.dashboard');
}

public function adminDashboard()
{
    $studentCount = Student::count();

    $sosCount = SosRequest::count();

    $complaintCount = Complaint::count();

    $eventCount = Event::count();

    // Temporary (until modules are created)
    $scholarshipCount = 0;
    $placementCount = 0;

    $pendingSOS = SosRequest::where('status', 'Pending')->count();

    $resolvedSOS = SosRequest::where('status', 'Resolved')->count();

    $pendingComplaints = Complaint::where('status', 'Pending')->count();

    $resolvedComplaints = Complaint::where('status', 'Resolved')->count();

    $recentSOS = SosRequest::latest()->take(5)->get();

    $recentComplaints = Complaint::latest()->take(5)->get();

    return view('auth.admin-dashboard', compact(
        'studentCount',
        'sosCount',
        'complaintCount',
        'eventCount',
        'scholarshipCount',
        'placementCount',
        'pendingSOS',
        'resolvedSOS',
        'pendingComplaints',
        'resolvedComplaints',
        'recentSOS',
        'recentComplaints'
    ));
}
public function updateSOS(Request $request,$id)
{


$sos = SosRequest::find($id);


$sos->status = $request->status;


$sos->save();



return back()->with(
'success',
'SOS Status Updated Successfully'
);


}
public function students()
{
    $students = Student::latest()->paginate(10);

    return view('auth.students', compact('students'));
}
public function studentDetails($id)
{
    $student = Student::findOrFail($id);

    return view('auth.student-details', compact('student'));
}
public function editStudent($id)
{
    $student = Student::findOrFail($id);

    return view('auth.edit-student', compact('student'));
}
public function updateStudent(Request $request,$id)
{
    $student = Student::findOrFail($id);

    $student->update([
        'name'=>$request->name,
        'phone'=>$request->phone,
        'department'=>$request->department,
        'year'=>$request->year,
        'address'=>$request->address,
    ]);

    return redirect()->route('admin.students')
        ->with('success','Student Updated Successfully');
}
public function deleteStudent($id)
{
    Student::findOrFail($id)->delete();

    return back()->with('success','Student Deleted Successfully');
}
public function complaints()
{

return view('auth.complaints');

}
public function storeComplaint(Request $request)
{

$request->validate([

'subject'=>'required',

'message'=>'required'

]);


Complaint::create([

'student_id'=>session('student_id'),

'subject'=>$request->subject,

'message'=>$request->message

]);


return back()->with(
'success',
'Complaint Submitted Successfully'
);


}
public function myComplaints()
{

$complaints = Complaint::where(
'student_id',
session('student_id')
)
->latest()
->get();


return view(
'auth.my-complaints',
compact('complaints')
);

}
public function adminComplaints()
{

$totalComplaints = Complaint::count();


$pending = Complaint::where('status','Pending')->count();


$progress = Complaint::where('status','In Progress')->count();


$resolved = Complaint::where('status','Resolved')->count();



$subjectWise = Complaint::select(
'subject',
\DB::raw('count(*) as total')
)
->groupBy('subject')
->get();



$complaints = Complaint::with('student')
->latest()
->get();



return view('auth.admin-complaints',
compact(
'totalComplaints',
'pending',
'progress',
'resolved',
'subjectWise',
'complaints'
));


}
public function updateComplaint(Request $request,$id)
{

$complaint = Complaint::find($id);


$complaint->status = $request->status;


$complaint->save();


return back()->with(
'success',
'Complaint Updated Successfully'
);

}
public function events()
{

$events = Event::latest()->get();


return view('auth.admin-events',
compact('events'));

}
public function storeEvent(Request $request)
{

$request->validate([

'title'=>'required',

'description'=>'required',

'date'=>'required',

'venue'=>'required'

]);


Event::create([

'title'=>$request->title,

'description'=>$request->description,

'date'=>$request->date,

'venue'=>$request->venue

]);


return back()->with(
'success',
'Event Added Successfully'
);

}
public function deleteEvent($id)
{

Event::find($id)->delete();


return back();

}
public function studentEvents()
{

$events = Event::latest()->get();


return view('auth.events',
compact('events'));

}
// Student Health Page

public function health()
{
    $studentId = session('student_id');

    if (!$studentId) {
        return redirect('/login')->with('error', 'Please login again.');
    }

    $student = Student::find($studentId);

    if (!$student) {
        return redirect('/login')->with('error', 'Student not found.');
    }

    $health = HealthInfo::where('student_id', $student->id)->first();
    $medical = MedicalCard::where('student_id', $student->id)->first();

    return view('auth.health', compact('health', 'medical'));
}
public function hostel()
{

    return view('auth.hostel');

}





// Admin Health Page

public function adminHealth()
{

    $health = HealthInfo::first();


    return view('auth.admin-health',
    compact('health'));

}





// Update Health Information

public function updateHealth(Request $request)
{


    $request->validate([

        'health_tip'=>'required',
        'medical_center'=>'required',
        'doctor_name'=>'required',
        'contact_number'=>'required'

    ]);



    $health = HealthInfo::first();



    if(!$health)
    {

        $health = new HealthInfo();

    }



    $health->health_tip =
    $request->health_tip;


    $health->medical_center =
    $request->medical_center;


    $health->doctor_name =
    $request->doctor_name;


    $health->contact_number =
    $request->contact_number;


    $health->save();



    return back()->with(
        'success',
        'Health Information Updated Successfully'
    );


}
public function hostelComplaint(Request $request)
{

    $request->validate([

        'category'=>'required',

        'description'=>'required'

    ]);


    HostelComplaint::create([

        'student_id'=>session('student_id'),

        'category'=>$request->category,

        'description'=>$request->description,

        'status'=>'Pending'

    ]);


    return back()->with(
        'success',
        'Hostel Complaint Submitted Successfully'
    );

}
public function hostelLeave(Request $request)
{

    $request->validate([

        'from_date'=>'required',

        'to_date'=>'required',

        'reason'=>'required'

    ]);


    HostelLeave::create([

        'student_id'=>session('student_id'),

        'from_date'=>$request->from_date,

        'to_date'=>$request->to_date,

        'reason'=>$request->reason,

        'status'=>'Pending'

    ]);


    return back()->with(
        'success',
        'Leave Request Submitted Successfully'
    );

}
public function updateHostelComplaint(Request $request,$id)
{

    $request->validate([
        'status'=>'required'
    ]);


    $complaint = HostelComplaint::findOrFail($id);


    $complaint->status =
    $request->status;


    $complaint->save();


    return back()->with(
        'success',
        'Complaint Status Updated'
    );

}
public function updateHostelLeave(Request $request,$id)
{

    $request->validate([
        'status'=>'required'
    ]);


    $leave = HostelLeave::findOrFail($id);


    $leave->status =
    $request->status;


    $leave->save();


    return back()->with(
        'success',
        'Leave Status Updated'
    );

}
public function adminHostel()
{
    $complaints = HostelComplaint::with('student')->latest()->get();

    $leaves = HostelLeave::with('student')->latest()->get();

    $passes = VisitorPass::with('student')->latest()->get();

    $availableRooms = 18;

    return view('auth.admin-hostel', compact(
        'complaints',
        'leaves',
        'passes',
        'availableRooms'
    ));
}
public function visitor()
{
    $passes = VisitorPass::where(
        'student_id',
        session('student_id')
    )->latest()->get();

    return view('auth.visitor',compact('passes'));
}
public function saveVisitor(Request $request)
{
    $request->validate([
        'visitor_name' => 'required',
        'relationship' => 'required',
        'mobile' => 'required',
        'visit_date' => 'required',
        'in_time' => 'required',
        'out_time' => 'required',
        'reason' => 'required'
    ]);

    VisitorPass::create([
        'student_id' => session('student_id'),
        'visitor_name' => $request->visitor_name,
        'relation' => $request->relationship,
        'mobile' => $request->mobile,
        'visit_date' => $request->visit_date,
        'in_time' => $request->in_time,
        'out_time' => $request->out_time,
        'reason' => $request->reason,
        'status' => 'Pending'
    ]);

    return back()->with('success','Visitor Pass Request Submitted Successfully');
}
public function adminVisitor()
{
    $passes = VisitorPass::with('student')
                ->latest()
                ->get();

    return view('auth.admin-visitor', compact('passes'));
}
public function updateVisitorStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required'
    ]);

    $pass = VisitorPass::findOrFail($id);

    $pass->status = $request->status;

    $pass->save();

    return back()->with(
        'success',
        'Visitor Pass Status Updated Successfully'
    );
}
public function scholarship()
{
    $scholarships = Scholarship::latest()->get();

    $applications = ScholarshipApplication::where(
        'student_id',
        session('student_id')
    )->get();

    return view(
        'auth.scholarship',
        compact(
            'scholarships',
            'applications'
        )
    );
}
public function applyScholarship(Request $request,$id)
{

    $request->validate([

        'income_certificate'=>'required|file',

        'community_certificate'=>'required|file',

        'marksheet'=>'required|file'

    ]);

    $income = $request->file('income_certificate')
    ->store('scholarships','public');

    $community = $request->file('community_certificate')
    ->store('scholarships','public');

    $marksheet = $request->file('marksheet')
    ->store('scholarships','public');

    ScholarshipApplication::create([

        'student_id'=>session('student_id'),

        'scholarship_id'=>$id,

        'income_certificate'=>$income,

        'community_certificate'=>$community,

        'marksheet'=>$marksheet,

        'status'=>'Pending'

    ]);

    return back()->with(
        'success',
        'Scholarship Applied Successfully'
    );

}
public function adminScholarship()
{

    $scholarships = Scholarship::latest()->get();

    $applications = ScholarshipApplication::with(
        'student',
        'scholarship'
    )->latest()->get();

    return view(
        'auth.admin-scholarship',
        compact(
            'scholarships',
            'applications'
        )
    );

}
public function storeScholarship(Request $request)
{

    $request->validate([

        'title'=>'required',

        'provider'=>'required',

        'amount'=>'required',

        'eligibility'=>'required',

        'last_date'=>'required'

    ]);

    Scholarship::create([

        'title'=>$request->title,

        'provider'=>$request->provider,

        'amount'=>$request->amount,

        'eligibility'=>$request->eligibility,

        'last_date'=>$request->last_date,

        'description'=>$request->description

    ]);

    return back()->with(
        'success',
        'Scholarship Added Successfully'
    );

}
public function updateScholarshipStatus(Request $request,$id)
{

    $application = ScholarshipApplication::findOrFail($id);

    $application->status = $request->status;

    $application->save();

    return back()->with(
        'success',
        'Status Updated Successfully'
    );

}
public function deleteScholarship($id)
{
    Scholarship::findOrFail($id)->delete();

    return back()->with(
        'success',
        'Scholarship Deleted Successfully'
    );
}
public function adminLogout()
{
    session()->forget('admin');

    return redirect('/admin/login')
        ->with('success', 'Logged out successfully');
}
public function medicalCard()
{
    $student = Student::find(session('student_id'));

    if (!$student) {
        return redirect('/login')->with('error', 'Student not found');
    }

    $medical = MedicalCard::where(
        'student_id',
        $student->id
    )->first();

    return view(
        'auth.medical-card',
        compact('medical')
    );
}
public function saveMedicalCard(Request $request)
{
    $student = Student::find(session('student_id'));

    if(!$student){
        return redirect('/login');
    }


    MedicalCard::updateOrCreate(

        [
            'student_id'=>$student->id
        ],

        [
            'blood_group'=>$request->blood_group,
            'allergies'=>$request->allergies,
            'medical_conditions'=>$request->medical_conditions,
            'emergency_contact'=>$request->emergency_contact,
        ]

    );


    return redirect('/health')
        ->with('success','Medical Card Saved Successfully');
}

}
