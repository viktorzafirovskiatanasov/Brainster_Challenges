<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\ValidateProjectRequest;
use App\Mail\CompanyContactMail;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class MainController extends Controller
{
    //
    public function homepage()
    {
        // Retrieve all projects
        $projects = Project::getAllProjects();

        // Pass the projects data to the view
        return view('homepage', ['projects' => $projects]);
    }
    public function login()
    {
        return view('login');
    }
    public function logout()
    {
        session()->flush();
        return redirect()->route('homepage');
    }
    public function adminPanel()
    {
        $projects = Project::getAllProjects();
        return view('adminPanel', ['projects' => $projects]);
    }
    public function deleteProject($id)
    {
        $project = Project::find($id);

        if (!$project) {
            return redirect()->back()->with('error', 'Проектот не е пронајден.');
        }

        $project->delete();

        return redirect()->back()->with('success', 'Проектот е успешно избришан.');
    }
    public function addProject(ValidateProjectRequest $request)
    {
        $validatedData = $request->validated();

        Project::create($validatedData);
        session()->flash('success', 'Продуктот е успешно додаден');
        return redirect()->route('adminPanel');
    }
    public function validateLogin(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {

            $request->session()->put('user_id', $user->id);


            return redirect()->route('adminPanel');
        } else {

            return redirect()->route('login')->withErrors(['email' => 'Invalid credentials']);
        }
    }
    public function editProject(ValidateProjectRequest $request, $id)
    {
        $validatedData = $request->validated();

        $project = Project::find($id);

        $project->update($validatedData);

        return redirect()->back()->with('success', 'Продуктот е упдејтиран успешно');
    }



    

    public function employment(Request $request)
{
    $validatedData = $request->validate([
        'email' => 'required|email',
        'phone' => 'required',
        'company' => 'required',
    ]);

    $companyData = [
        'email' => $validatedData['email'],
        'phone' => $validatedData['phone'],
        'company' => $validatedData['company'],
    ];

    $sendGridApiKey = getenv('SENDGRID_API_KEY');

    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . $sendGridApiKey,
    ])->post('https://api.sendgrid.com/v3/mail/send', [
        'personalizations' => [
            [
                'to' => [
                    ['email' => $companyData['email']],
                ],
                'subject' => 'Responding to your interest to our students',
            ],
        ],
        'from' => [
            'email' => 'viktorzafirovski3@gmail.com',
            'name' => 'Brainster',
        ],
        'content' => [
            [
                'type' => 'text/plain',
                'value' => 'We will be contacting you with further opportunities and potential students that are suitable for your company',
            ],
        ],
    ]);

    return redirect()->back()->with('success', 'Email sent successfully');
}

    



}
