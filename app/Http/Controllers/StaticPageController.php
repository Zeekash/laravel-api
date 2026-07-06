<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Session;
use App\Models\Company;
use App\Models\GetQuote;
use Illuminate\Support\Facades\Storage;
use App\Models\Country;
use App\Models\State;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\City;
use App\Models\ContactUs;
use App\User;
use Validator;
use Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\CompanyVerify;
use App\Models\UserVerify;
use App\Models\PostCategory; 
use App\Models\Post; 
use App\Models\Comment; 
use App\Models\Admin; 
use Mail;
use Carbon\Carbon; 
use Illuminate\Validation\Rule;
use App\Http\Requests\StoreUserRequest;

class StaticPageController extends Controller
{
     /**
     * bizLead page
    */
    public function bizLead()
    {   
        
        return view('frontend.company_auth.static_pages.biz-lead');
    }

    /**
     * privacy&policy page
    */
    public function privacyPolicy()
    {   
        
        return view('frontend.company_auth.static_pages.privacy-policy');
    }
    
    /**
     * about us page
    */
    public function aboutUs()
    {   
        
        return view('frontend.company_auth.static_pages.about-us');
    }
    
    /**
     * buinesses home page
     */
    public function businessesHome()
    {   
        
        return view('frontend.company_auth.static_pages.businesses-home');
    }

    /**
     * FAQs page
    */
    public function Faqs()
    {   
        
        return view('frontend.company_auth.static_pages.faqs');
    }
    
    /**
     * registered movers page
     */
    public function registeredMover()
    {   
        
        return view('frontend.company_auth.static_pages.registered-movers');
    }
    
    /**
     * brand center page
     */
    public function brandCenter()
    {   
        
        return view('frontend.company_auth.static_pages.brand-center');
    }
   
    /**
     * live call transfer page
     */
    public function liveCalltransfer()
    {   
        
        return view('frontend.company_auth.static_pages.live-call-transfer');
    }
   
    /**
     * leads help document page
     */
    public function leadDocument()
    {   
        
        return view('frontend.company_auth.static_pages.leads-help-document');
    }
    
    /**
     * advertising page
     */
    public function Ads()
    {   
        
        return view('frontend.company_auth.static_pages.advertising');
    }
   
    /**
     * advertising Faqs page
     */
    public function AdsFaqs()
    {   
        
        return view('frontend.company_auth.static_pages.advertising-faqs');
    }
    
    /**
     * advertising Plans pages
     */
    public function AdsPlans()
    {   
        
        return view('frontend.company_auth.static_pages.advertising-plans');
    }
    
    /**
     * advertising Listing page
     */
    public function AdsListing()
    {   
        
        return view('frontend.company_auth.static_pages.listing-ads');
    }
    
    /**
     * advertising profile page
    */
    public function AdsProfile()
    {   
        
        return view('frontend.company_auth.static_pages.profile-ads');
    }
    
    /**
     * Contact sales page
     */
    public function contactSale()
    {   
        
        return view('frontend.company_auth.static_pages.contact-sales');
    }
    
    /**
     * affiliate program page
     */
    public function affiliate()
    {   
        
        return view('frontend.company_auth.static_pages.affiliate');
    }
    
    /**
     * Lead Form page
    */
    public function leadForm()
    {   
        
        return view('frontend.company_auth.static_pages.wp-lead-form');
    }
    
    /**
     * Marketing Tips page
     */
    public function marketTips()
    {   
        
        return view('frontend.company_auth.static_pages.marketing-tips');
    }
    
    /**
     * reputation guide page
    */
    public function reputationGuide()
    {   
        
        return view('frontend.company_auth.static_pages.reputation-guide');
    }
    
    /**
     * review filter page
     */
    public function reviewFilter()
    {   
        
        return view('frontend.company_auth.static_pages.review-filter');
    }
    
    /**
     * moving leads tips page
     */
    public function moveLeadtips()
    {   
        
        return view('frontend.company_auth.static_pages.moving-leads-tips');
    }
    
    /**
     * health&support page
    */
    public function helpSupport()
    {   
        
        return view('frontend.company_auth.static_pages.help-support');
    }
    
    /**
     * content guideline page
    */
    public function contentGuideline()
    {   
        
        return view('frontend.company_auth.static_pages.content-guidelines');
    }

    /**
     * support faqs page
    */
    public function supportFaqs()
    {   
        
        return view('frontend.company_auth.static_pages.support-faqs');
    }

    /**
     * top movers page
    */
    public function topMovers()
    {   
        
        return view('frontend.company_auth.static_pages.top-movers');
    }

    /**
     * Top Mover one Page
    */
    public function topMoverOne()
    {   
        
        return view('frontend.company_auth.static_pages.top-mover-one');
    }

    /**
     * Top Mover two Page
    */
    public function topMoverTwo()
    {   
        
        return view('frontend.company_auth.static_pages.top-mover-two');
    }

    /**
     * Top Mover Three Page
    */
    public function topMoverThree()
    {   
        
        return view('frontend.company_auth.static_pages.top-mover-three');
    }
  
    /**
     * Contact Us page
    */
    public function Contact()
    {   
        
        return view('frontend.company_auth.static_pages.contact-us');
    }

    /**
     * terms of service page
    */
    public function termService()
    {   
        
        return view('frontend.company_auth.static_pages.terms-of-service');
    }
}
