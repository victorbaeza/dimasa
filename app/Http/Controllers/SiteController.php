<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;

// Clases propias
use Helper;
use Contact;
use NewsletterSubscriber;
use Blog;
use App\Jobs\SendEmailJob;
use App\Jobs\SendContactConfirmationEmail;

class SiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function test()
    {
        $contact = Contact::first();

        // dispatch(new SendEmailJob($contact));
        // SendEmailJob::dispatch($contact);
        SendContactConfirmationEmail::dispatch($contact);

        dd('enviado');
    }


    public function index()
    {
        return view('site.index');
    }

    public function listBlogs(Request $request)
    {
        $blogs = Blog::translatedIn(app()->getLocale())->orderBy('id', 'DESC');

        $blogs = $blogs->paginate(self::NUM_PAGED_RESULTS);

        return view('site.blog.list', compact('blogs'));
    }

    public function showBlog(Request $request, string $slug)
    {
        $blog = Blog::whereTranslation('slug', $slug)->firstOrFail();

        $related_blogs = Blog::where('id', '!=', $blog->id)->limit(3)->get();

        return view('site.blog.post', compact('blog', 'related_blogs'));
    }


    public function do_subscribeNewsletter(Request $request)
    {
        $exists_subscriber = NewsletterSubscriber::where('email', $request->input('e'))->first();
        if ($exists_subscriber) return redirect()->back()->with('error', 'Oh vaya! Parece ser que ya estás suscrito al newsletter');

        $newsletter_subscriber = new NewsletterSubscriber;
        $newsletter_subscriber->email = $request->input('e');
        $newsletter_subscriber->save();

        return redirect()->back()->with('success', 'Te has suscrito a nuestro newsletter!');
    }

    public function getContact()
    {
        return view('site.contact');
    }

    public function do_submitContact(Request $request)
    {
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $remoteip = $_SERVER['REMOTE_ADDR'];
        $data = [
            'secret' => env('GOOGLE_CAPTCHA_SECRET_KEY'),
            'response' => $request->get('g-recaptcha-response'),
            'remoteip' => $remoteip
        ];
        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            ]
        ];
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        $resultJson = json_decode($response);
        if ($resultJson->success != true) {
            return back()->withErrors(['captcha' => trans('common.error_recaptcha')]);
        }
        $contact = new Contact;
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->phone = $request->input('phone');
        $contact->subject = $request->input('subject');
        $contact->message = $request->input('message');
        $contact->save();

        SendContactConfirmationEmail::dispatch($contact);

        return back()->with('success', trans('common.contacto_ok'));
    }

    public function getAboutUs()
    {
        return view('site.about-us');
    }

    public function do_acceptCookies(Request $request)
    {
        $request->session()->put('cookies', 1);
    }

    public function getLegal()
    {
      return view('site.legal');
    }

    public function getPrivacy()
    {
      return view('site.privacy');
    }

    public function getCookies()
    {
      return view('site.cookies');
    }
}
