<?php

namespace App\Http\Controllers;

use App\Models\AboutModel;
use App\Models\CompanyModel;
use App\Models\HomeModel;
use App\Models\LocationModel;
use App\Models\ServiceModel;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use App\Models\ProjectModel;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function home()
    {
        $homeData = HomeModel::first();
        $companyData = CompanyModel::first();
        return view('landingpage.home', compact('homeData', 'companyData'));
    }

    public function about()
    {
        $aboutData = AboutModel::first();
        $companyData = CompanyModel::first();
        return view('landingpage.about', compact('aboutData', 'companyData'));
    }

    public function project()
    {
        // In your controller method
        $projectsOnGoing = ProjectModel::where('status_project', 'on going')
            ->orderBy('created_at', 'desc')
            ->get();

        $projectsCompleted = ProjectModel::where('status_project', 'completed')
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        $companyData = CompanyModel::first();
        return view('landingpage.project', compact('companyData', 'projectsOnGoing', 'projectsCompleted'));
    }

    public function services()
    {
        $serviceData = ServiceModel::with('details')->get();
        $companyData = CompanyModel::first();
        return view('landingpage.services', compact('serviceData', 'companyData'));
    }

    public function location()
    {
        $locationData = LocationModel::first();
        $companyData = CompanyModel::first();
        return view('landingpage.location', compact('locationData', 'companyData'));
    }

    public function contact()
    {
        $companyData = CompanyModel::first();
        return view('landingpage.contact', compact('companyData'));
    }

    public function sendContactForm(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'telphone' => 'required',
            'email' => 'required|email',
            'company_name' => 'required',
            'message' => 'required',
        ]);

        $details = [
            'name' => $validatedData['name'],
            'telphone' => $validatedData['telphone'],
            'email' => $validatedData['email'],
            'company_name' => $validatedData['company_name'],
            'message' => $validatedData['message'],
        ];

        // Pass the form's email field as the sender
        Mail::to('sinarpanca@gmail.com')->send(new ContactMail($details, $validatedData['email']));

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
