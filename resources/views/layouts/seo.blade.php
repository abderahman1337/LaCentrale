      @php 
      $website_settings=[
         'website_url'=>$websiteURL,
         'website_name'=>$websiteName,
         'website_description'=> $websiteDescription,
         'main_color'=>'#ecb149',
         'social_links'=> Settings::website_social_links(),
         /* 'facebook_domain_verification' => Settings::get('facebook_domain_verification'),
         'google_site_verification' =>  Settings::get('google_site_verification'), */
         'website_icon'=> Settings::website_favicon(), //lite
         /* 'website_icon_url'=> Settings::get('store_favicon'),  */
         'website_logo'=> Settings::website_logo(), //lite
         'phone'=> Settings::website_phone(),
         'canonical'=>str_replace('/index.php', '', request()->url()),
         'twitter_author'=>$websiteName
      ]; 
      $website_settings=collect($website_settings);  
      $vehicule_name = isset($vehicule_name)&&$vehicule_name!=null?$vehicule_name:null;
      $vehicule_price = isset($vehicule_price)&&$vehicule_price!=null?$vehicule_price:null;
      if(request()->url()==env("APP_URL")){
            $page_title=  isset($page_title)&&$page_title !=null?$website_settings['website_name'] .' - '. $page_title :$website_settings['website_name'];
            $page_description=isset($seo_meta_description)&&$seo_meta_description !=null?$seo_meta_description:$website_settings['website_description'];
            $page_image= isset($page_image)&&$page_image !=null?$page_image:$website_settings['website_logo'];
            $page_keywords= isset($seo_key_words)&&$seo_key_words !=null? $seo_key_words:"";
            $website_settings['canonical']= isset($canonical) && $canonical!=null ? $canonical:$website_settings['canonical'];
            
      }
      else{
            $page_title=  isset($page_title)&&$page_title !=null?$page_title.' - '.$website_settings['website_name']:$website_settings['website_name'];
            $page_description=isset($seo_meta_description)&&$seo_meta_description !=null?$seo_meta_description:$website_settings['website_description'];
            $page_image= isset($page_image)&&$page_image !=null?$page_image:$website_settings['website_logo'];
            $page_keywords= isset($seo_key_words)&&$seo_key_words !=null? $seo_key_words:"";
            $website_settings['canonical']= isset($canonical) && $canonical!=null ? $canonical:$website_settings['canonical'];
           
      }

      @endphp
      <title>{{$page_title}}</title>

      {{-- <link rel="icon" type="image/png" href="{{$website_settings['website_icon']!=null?$website_settings['website_icon']:$website_settings['website_icon_url']}}" />  --}}
      {{-- <meta name="theme-color" content="{{$website_settings['main_color']}}"> --}}
      <meta name="mobile-web-app-capable" content="no">
      <meta name="application-name" content="{{$website_settings['website_name']}}">
      {{-- <meta name="facebook-domain-verification" content="{{$website_settings['facebook_domain_verification']}}" /> --}}
      {{-- <meta name="google-site-verification" content="{{$website_settings['google_site_verification']}}" /> --}}
      <meta name="apple-mobile-web-app-capable" content="no">
      <meta name="apple-mobile-web-app-status-bar-style" content="black">
      <meta name="apple-mobile-web-app-title" content="{{$website_settings['website_name']}}">
      <link rel="apple-touch-icon" href="{{$website_settings['website_icon']}}?v=2">
      <link rel='alternate' href="{{request()->url()}}" hreflang='x-default' />
      <meta name="author" content="{{$website_settings['website_name']}}" />
      <meta name="description" content="{{$page_description}}">
      <link rel="canonical" href="{{$website_settings['canonical']}}">
      @if($page_keywords)
      <meta name="keywords" content="{{$page_keywords}}">
      @endif
      {{-- <meta name="msapplication-TileColor" content="{{$website_settings['main_color']}}"> --}}
      {{-- <meta name="msapplication-TileImage" content="{{$website_settings['website_icon_url']}}"> --}}
      <meta name="msapplication-square70x70logo" content="{{$website_settings['website_logo']}}" />
      <meta name="msapplication-square150x150logo" content="{{$website_settings['website_logo']}}" />
      <meta name="msapplication-wide310x150logo" content="{{$website_settings['website_logo']}}" />
      <meta name="msapplication-square310x310logo" content="{{$website_settings['website_logo']}}" />
      <link rel="apple-touch-icon-precomposed" href="{{$website_settings['website_logo']}}" />
      <meta property="og:type" content="website" />
      <meta property="og:site_name" content="{{$website_settings['website_name']}}" />
      <meta property="og:locale" content="fr_FR"/>
      <meta property="og:locale:alternate" content="fr_FR"/>
      <meta property="og:url" content="{{request()->url()}}" />
      <meta property="og:title" content="{{$page_title}}" />
      <meta property="og:description" content="{{$page_description}}" />
      <meta property="og:image" content="{{$page_image}}" />
      @if ($vehicule_name != null)
      <meta property="product:plural_title" content="{{$vehicule_name}}" />
      <meta property="product:condition" content="occasion">
      <meta property="product:brand" content="{{$vehicule_name}}">
      @endif
      @if ($vehicule_price!=null)
      <meta property="product:price:amount" content="{{$vehicule_price}}"/>
      <meta property="product:sale_price:currency" content="€">
      <meta property="product:price:currency" content="€"/>
      @endif
      <meta itemprop="name" content="{{$page_title}}" />
      <meta itemprop="url" content="{{$website_settings['website_url']}}" />
      <meta itemprop="author" content="{{$website_settings['website_name']}}" />
      <meta itemprop="image" content="{{$page_image}}" />
      <meta itemprop="description" content="{{$page_description}}" />
      <meta name="twitter:image" content="{{$page_image}}" />
      <meta name="twitter:card" content="summary" />
      <meta name="twitter:site" content="{{'@'.$website_settings['twitter_author']}}" />
      <meta name="twitter:creator" content="{{'@'.$website_settings['twitter_author']}}" />
      <meta name="twitter:title" content="{{$page_title}}" />
      <meta name="twitter:image:src" content="{{$page_image}}" />
      <meta name="twitter:description" content="{{$page_description}}" />
      

