@php
    $from = strlen($from) > 18 ? substr($from, 0, 18).'…' : $from;
    $to   = strlen($to) > 18 ? substr($to, 0, 18).'…' : $to;
@endphp



<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 630" webcrx="">
  <defs>
    <style>
      .bg            { fill: #f4fafb; }
      .header        { fill: #033640; }
      .accent        { fill: #0f7b86; }
      .accent-light  { fill: #d7f0f3; }
      .text-main     { fill:#033640; font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif; }
      .text-heading  { font-weight:700; letter-spacing: 1px; }
      .text-label    { font-size: 24px; opacity:.8; }
      .text-big      { font-size: 54px; font-weight:700; }
      .text-medium   { font-size: 34px; font-weight:600; }
    </style>
  </defs>

  <!-- Background -->
  <rect class="bg" x="0" y="0" width="1200" height="630"/>

  <!-- Top header bar -->
  

  <!-- Logo -->
  <g transform="translate(60,35)">
    <rect x="-20" y="-10" width="260" height="60" rx="30" ry="30" fill="white" opacity="0.08"/>
    <image href="https://mymovingjourney.com/assets/img/logo.png" x="0" y="-5" height="50"/>
  </g>

  <!-- Tagline -->
  

  <!-- Center "Moving From" -->
  <text x="600" y="200" text-anchor="middle" class="text-main text-heading" font-size="52">
    Moving From
  </text>

  <!-- Left (FROM) card -->
  <g transform="translate(100,240)">
    <rect x="0" y="0" width="460" height="210" rx="24" class="accent-light"/>
    <text x="30" y="55" class="text-main text-label">FROM</text>
    <text x="30" y="130" class="text-main text-big">{{ $from }}</text>
  </g>

  <!-- Right (TO) card -->
  <g transform="translate(640,240)">
    <rect x="0" y="0" width="500" height="210" rx="24" class="accent-light"/>
    <text x="30" y="55" class="text-main text-label">TO</text>
    <text x="30" y="130" class="text-main text-big">{{ $to }}</text>
  </g>

  <!-- Circle "to" badge -->
  <g transform="translate(600,345)">
    <circle r="60" class="accent"/>
    <circle r="48" fill="#ffffff"/>
    <text x="0" y="10" text-anchor="middle" class="text-main text-medium">
      to
    </text>
  </g>

  <!-- Bottom bar -->
  
  <text x="60" y="595" class="text-main" fill="#ffffff" font-size="26">
    mymovingjourney.com
  </text>
  <text x="1140" y="595" text-anchor="end" class="text-main" fill="#c7e6e9" font-size="22">
    Trusted movers. Real reviews. Smarter moves.
  </text>
</svg>