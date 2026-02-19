<meta name="robots" content="max-snippet:-1,max-image-preview:large,max-video-preview:-1">
<meta property="og:url" content="{{ request()->url() }}" />
<meta property="og:type" content="website" />
<meta property="og:title" content="{{ $title }}" />
@if (!empty($resume))
  <meta property="og:description" content="{{ strip_tags($resume) }}" />
@else
  <meta property="og:description" content="{{ config('app.name') }}" />
@endif


<meta property="og:locale" content="pt_BR">
<meta property="og:site_name" content="{{ config('app.name') }}" />
