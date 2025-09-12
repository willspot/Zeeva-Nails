<!DOCTYPE html>
<html class="scroll-smooth" lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zeeva Nails</title>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  @vite('resources/css/app.css')
</head>
<body class="relative min-h-screen bg-gradient-to-b from-pink-100 via-pink-50 to-white overflow-x-hidden">
  
  <!-- Top Left Glow -->
  <div class="absolute -left-40 -top-32 w-[880px] h-[850px] bg-pink-400/40 blur-[100px] rounded-full pointer-events-none"></div>

  <!-- Navbar -->
  <x-navbar />

  <!-- Hero Section -->
<section class="relative flex flex-col items-center justify-center text-center pt-32 md:pt-40 px-6">

  <!-- Floating Icons -->
  <style>
    .icon-1 { top: 160px; left: 30px; opacity: 50%; }
    .icon-2 { bottom: 130px; left: 30px; opacity: 50%; }
    .icon-3 { top: 170px; right: 40px; opacity: 50%; }
    .icon-4 { bottom: 40px; right: 30px; opacity: 50%; }

    @media (min-width: 767px) and (max-width: 1023px) {
        .icon-1 { top: 200px; left: 120px; }
        .icon-2 { bottom: 100px; left: 100px; }
        .icon-3 { top: 200px; right: 120px; }
        .icon-4 { bottom: 160px; right: 100px; }
    }

    @media (min-width: 1024px) {
      .icon-1 { top: 95px; left: 90px; }
      .icon-2 { bottom: 65px; left: 190px; }
      .icon-3 { top: 90px; right: 90px; }
      .icon-4 { bottom: 53px; right: 157px; }
    }

    @keyframes float {
    0%, 100% {
      transform: translateY(0);
    }
    50% {
      transform: translateY(-10px);
    }
  }

  .animate-float {
    animation: float 4s ease-in-out infinite;
  }

  .icon-1.animate-float { animation-delay: 0s; }
  .icon-2.animate-float { animation-delay: 1s; }
  .icon-3.animate-float { animation-delay: 2s; }
  .icon-4.animate-float { animation-delay: 3s; }
  </style>

  <!-- Floating Icons -->
  @php
    $iconClasses = ['icon-1', 'icon-2', 'icon-3', 'icon-4'];
  @endphp

  @foreach($iconClasses as $i => $class)
    <div class="absolute w-12 md:w-16 h-12 md:h-16 animate-float {{ $class }}">
      {!! file_get_contents(public_path('icons/envelop.svg')) !!}
    </div>
  @endforeach

  <!-- Headings -->
  <h1 class="text-3xl md:text-7xl cormorant font-bold leading-snug text-gray-800">
    <span class="text-pink-500">Every Detail</span> Perfected, Every
  </h1>
  <h1 class="text-3xl md:text-7xl cormorant font-bold pt-2 leading-snug text-gray-800">
    Nail A Work Of Art!
  </h1>

  <!-- Paragraph -->
  <p class="mt-4 md:mt-6 max-w-xl text-sm md:text-base font-medium text-gray-600">
    At Zeeva Nails, our artistry lives in the details: the seamless gloss,
    the delicate sparkle, the color that matches your mood.
  </p>

  <!-- Buttons -->
  <div class="mt-16 md:mt-8 flex flex-row sm:flex-row gap-4">
    <a href="{{ url('/bookings') }}" class="px-4 py-3 text-sm rounded-lg bg-pink-600 text-white font-medium shadow hover:bg-pink-700 transition">
      Book Now
    </a>
    <a href="#our-story" class="px-4 py-3 text-sm rounded-lg border border-pink-400 text-gray-700 font-medium hover:bg-pink-50 transition">
      Learn More
    </a>
  </div>

  <!-- Image -->
  <div class="mt-16 md:mt-8">
    <img src="/images/nail2.png" alt="Nail Art"
         class="mx-auto h-40 sm:h-56 md:h-[200px] object-contain">
  </div>
</section>


<!-- Our Story Section -->
<section id="our-story" class="scroll-mt-24 bg-pink-50 py-16 px-4">
    <div class="max-w-5xl mx-auto text-center">
        <!-- Title -->
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 flex items-center justify-center gap-2">
            Our Story
            <span class="text-3xl"><img src="/icons/heart2.svg" alt="heart"
               ></span>
        </h2>

        <!-- Description -->
        <p class="text-gray-700 font-semibold mt-6 leading-relaxed max-w-3xl mx-auto">
            Zeeva Nails was born from a simple dream: to create a sanctuary where beauty, artistry,
            and self-care come together in perfect harmony. Founded by master nail technician
            <span class="text-pink-500">Halima Lawal</span>, our salon began
            as a small studio with a big vision to transform
            <span class="text-pink-500">the nail care experience into something truly extraordinary</span>.
            What started as Zeeva&apos;s passion for nail art during her college years has blossomed into
            a full-service luxury salon.
        </p>

        <!-- Stats -->
        <div class="flex flex-col md:flex-row justify-center gap-10 md:gap-24 mt-10">
            <div>
                <h3 class="text-2xl font-bold text-pink-500">1000+</h3>
                <p class="text-gray-600 text-sm mt-1">Services</p>
            </div>
            <div>
                <h3 class="text-2xl font-bold text-pink-500">5 years</h3>
                <p class="text-gray-600 text-sm mt-1">Years Experience</p>
            </div>
            <div>
                <h3 class="text-2xl font-bold text-pink-500">500+</h3>
                <p class="text-gray-600 text-sm mt-1">Happy Client</p>
            </div>
        </div>

        <!-- Quote Box -->
        <div class="bg-pink-100 shadow-md rounded-lg mt-12 px-6 py-6 max-w-2xl mx-auto">
            <p class="text-gray-800 italic">
                “Every nail tells a story, and we&apos;re here to help you write yours beautifully.”
            </p>
            <p class="text-pink-500 font-medium mt-4">— Halima Lawal, Founder</p>
        </div>

        <!-- Features -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mt-16">
            <!-- Licensed Professionals -->
            <div class="flex flex-col items-center text-center">
                <div class="bg-pink-100 p-4 shadow-md">
                    <!-- Add your SVG icon here -->
                    <svg width="84" height="84" viewBox="0 0 84 84" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M59.7929 1.20623C59.2384 1.20325 58.6913 1.33365 58.1978 1.58644C57.7043 1.83924 57.2787 2.207 56.9571 2.65873L43.5734 21.8525C43.4893 21.9736 43.4376 22.1142 43.4232 22.261C43.4089 22.4077 43.4322 22.5557 43.4911 22.6908C43.5501 22.826 43.6426 22.9438 43.7598 23.0332C43.8771 23.1225 44.0153 23.1803 44.1613 23.2012C47.2852 23.6199 50.2562 24.8082 52.8071 26.6596C52.9593 26.7957 53.1563 26.8709 53.3604 26.8709C53.5646 26.8709 53.7616 26.7957 53.9138 26.6596L58.2021 22.1291C58.6884 21.6434 59.3477 21.3706 60.035 21.3706C60.7224 21.3706 61.3816 21.6434 61.8679 22.1291C62.3476 22.6256 62.6157 23.289 62.6157 23.9794C62.6157 24.6697 62.3476 25.3331 61.8679 25.8296L57.545 30.1179C57.4216 30.2759 57.3546 30.4707 57.3546 30.6712C57.3546 30.8717 57.4216 31.0665 57.545 31.2246C59.3479 33.7982 60.4774 36.7825 60.8304 39.905C60.8518 40.0546 60.9106 40.1964 61.0012 40.3173C61.0919 40.4381 61.2116 40.5342 61.3492 40.5966C61.4806 40.6725 61.6297 40.7125 61.7815 40.7125C61.9333 40.7125 62.0823 40.6725 62.2138 40.5966L81.4421 27.1091C81.8938 26.7875 82.2616 26.362 82.5144 25.8685C82.7672 25.3749 82.8976 24.8278 82.8946 24.2733C82.7909 16.25 67.7471 1.20623 59.7929 1.20623ZM31.0888 57.5771C30.9366 57.441 30.7396 57.3657 30.5354 57.3657C30.3313 57.3657 30.1343 57.441 29.9821 57.5771L24.6563 63.0066C24.1512 63.2938 23.5644 63.4031 22.9898 63.317C22.4153 63.2309 21.8863 62.9543 21.4876 62.5317C21.0889 62.1091 20.8437 61.5649 20.7912 60.9863C20.7386 60.4078 20.8819 59.8283 21.1979 59.3408L26.4892 54.0496C26.6126 53.8915 26.6796 53.6967 26.6796 53.4962C26.6796 53.2957 26.6126 53.1009 26.4892 52.9429C24.6379 50.392 23.4495 47.421 23.0309 44.2971C23.0095 44.1475 22.9507 44.0057 22.8601 43.8848C22.7694 43.7639 22.6497 43.6678 22.5121 43.6054C22.3872 43.529 22.2436 43.4885 22.0971 43.4885C21.9507 43.4885 21.8071 43.529 21.6821 43.6054L2.55753 57.0583C2.1058 57.3799 1.73804 57.8054 1.48525 58.299C1.23246 58.7925 1.10205 59.3396 1.10503 59.8941C1.10503 67.8483 16.1488 82.8921 24.1029 82.8921C24.6575 82.895 25.2046 82.7646 25.6981 82.5118C26.1916 82.259 26.6172 81.8913 26.9388 81.4396L40.3917 62.2112C40.4681 62.0863 40.5085 61.9427 40.5085 61.7962C40.5085 61.6498 40.4681 61.5062 40.3917 61.3812C40.3352 61.2396 40.2408 61.1162 40.1187 61.0247C39.9967 60.9332 39.8519 60.877 39.7 60.8625C36.6037 60.4899 33.6465 59.3616 31.0888 57.5771ZM55.3663 55.4675C53.1103 57.71 50.3279 59.3508 47.2738 60.24C47.1285 60.2805 46.9969 60.3599 46.8934 60.4696C46.7898 60.5792 46.718 60.7151 46.6859 60.8625C46.6518 61.0074 46.6529 61.1583 46.689 61.3026C46.7251 61.447 46.7951 61.5807 46.8934 61.6925L61.5221 76.2866C62.0076 76.7625 62.6226 77.0848 63.2902 77.2131C63.9578 77.3414 64.6484 77.2701 65.2758 77.0081C65.9031 76.7461 66.4393 76.305 66.8173 75.74C67.1954 75.175 67.3985 74.5111 67.4013 73.8312V67.5025H73.73C74.4099 67.4997 75.0738 67.2965 75.6388 66.9185C76.2038 66.5405 76.6449 66.0043 76.9069 65.377C77.1689 64.7496 77.2402 64.059 77.1119 63.3914C76.9836 62.7238 76.6613 62.1088 76.1854 61.6233L61.5567 46.9946C61.4525 46.8845 61.319 46.8065 61.172 46.7697C61.0249 46.733 60.8704 46.739 60.7267 46.7871C60.584 46.8213 60.4536 46.8943 60.3498 46.9981C60.246 47.1018 60.173 47.2323 60.1388 47.375C59.2565 50.4321 57.6147 53.2161 55.3663 55.4675Z" fill="#F34DBD"/>
                        <path d="M51.7179 32.1463C49.0863 29.6119 45.5872 28.1978 41.9481 28.1978C38.309 28.1978 34.8099 29.6119 32.1783 32.1463C30.8386 33.4274 29.7668 34.9659 29.0261 36.6712C28.2854 38.3765 27.8908 40.2141 27.8656 42.0756C27.8403 43.9371 28.1849 45.7848 28.8791 47.5099C29.5732 49.235 30.6028 50.8026 31.9073 52.1201C33.2118 53.4377 34.7646 54.4786 36.4743 55.1816C38.1841 55.8845 40.0161 56.2352 41.8624 56.213C43.7086 56.1909 45.5318 55.7963 47.2245 55.0525C48.9171 54.3087 50.4449 53.2307 51.7179 51.8822C53.0041 50.5869 54.0244 49.0486 54.7205 47.3554C55.4167 45.6622 55.775 43.8472 55.775 42.0143C55.775 40.1813 55.4167 38.3664 54.7205 36.6731C54.0244 34.9799 53.0041 33.4417 51.7179 32.1463Z" fill="#F34DBD"/>
                    </svg>

                </div>
                <h4 class="mt-4 text-lg font-semibold text-gray-900">Licensed Professionals</h4>
                <p class="text-gray-600 mt-2 text-sm">
                    Our certified nail technicians have years of experience and ongoing training
                </p>
            </div>

            <!-- Highest Hygiene Standards -->
            <div class="flex flex-col items-center text-center">
                <div class="bg-pink-100 p-4 shadow-md">
                    <!-- Add your SVG icon here -->
                    <svg width="84" height="83" viewBox="0 0 84 83" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M20.0177 15.678C14.298 18.2913 10.109 24.511 10.109 31.9269C10.109 39.5015 13.2119 45.3419 17.6525 50.3479C21.3174 54.4713 25.7512 57.8914 30.0745 61.2219C31.1043 62.0148 32.1213 62.8055 33.1257 63.5939C34.9392 65.0247 36.5562 66.2762 38.118 67.1898C39.6798 68.1034 40.9313 68.5172 42.0001 68.5172C43.0689 68.5172 44.3238 68.1034 45.8822 67.1898C47.444 66.2762 49.0609 65.0247 50.8744 63.5939C51.8788 62.8032 52.8959 62.0137 53.9256 61.2253C58.249 57.888 62.6827 54.4713 66.3476 50.3479C70.7917 45.3419 73.8911 39.5015 73.8911 31.9269C73.8911 24.5144 69.7022 18.2913 63.9825 15.678C58.4248 13.1371 50.9571 13.8094 43.8618 21.1839C43.6206 21.4342 43.3314 21.6333 43.0115 21.7692C42.6917 21.9052 42.3476 21.9753 42.0001 21.9753C41.6525 21.9753 41.3085 21.9052 40.9886 21.7692C40.6687 21.6333 40.3795 21.4342 40.1383 21.1839C33.043 13.8094 25.5753 13.1371 20.0177 15.678ZM42.0001 15.8021C34.029 8.66542 25.103 7.66559 17.8663 10.9719C10.2331 14.4713 4.9375 22.5803 4.9375 31.9304C4.9375 41.1184 8.76443 48.131 13.7877 53.7852C17.8077 58.312 22.7275 62.101 27.0751 65.4453C28.0634 66.2038 29.0127 66.9416 29.9228 67.6587C31.6915 69.0516 33.5877 70.5341 35.5081 71.658C37.4284 72.7819 39.6212 73.6921 42.0001 73.6921C44.379 73.6921 46.5717 72.7785 48.4921 71.658C50.4159 70.5341 52.3086 69.0516 54.0773 67.6587C54.9875 66.9416 55.9368 66.2038 56.9251 65.4453C61.2692 62.101 66.1925 58.3086 70.2124 53.7852C75.2357 48.131 79.0626 41.1184 79.0626 31.9304C79.0626 22.5803 73.7705 14.4713 66.1338 10.9788C58.8972 7.66904 49.9711 8.66887 42.0001 15.8021Z" fill="#DB45AA"/>
                    </svg>

                </div>
                <h4 class="mt-4 text-lg font-semibold text-gray-900">Highest Hygiene Standards</h4>
                <p class="text-gray-600 mt-2 text-sm">
                    We maintain strict sanitation protocols and use only sterilized tools
                </p>
            </div>

            <!-- Premium Products -->
            <div class="flex flex-col items-center text-center">
                <div class="bg-pink-100 p-4 shadow-md">
                    <!-- Add your SVG icon here -->
                    <svg width="72" height="73" viewBox="0 0 72 73" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M61.1248 51.3355C62.8209 51.3355 64.2508 51.9272 65.4144 53.1105C66.578 54.2938 67.15 55.6744 67.1302 57.2522L43.3748 66.1272L22.6665 60.2105V33.5855H28.4352L49.9423 41.5434C51.4806 42.1548 52.2498 43.2593 52.2498 44.8568C52.2498 45.7837 51.9145 46.5923 51.244 47.2826C50.5734 47.9729 49.7254 48.3377 48.6998 48.3772H40.4165L35.2394 46.3951L34.2631 49.1759L40.4165 51.3355H61.1248ZM49.2915 10.5993C51.382 8.17343 54.0445 6.96051 57.279 6.96051C59.9612 6.96051 62.2293 7.94662 64.0831 9.91884C65.937 11.8911 66.9231 14.1591 67.0415 16.723C67.0415 18.7544 66.0554 21.1802 64.0831 24.0005C62.1109 26.8208 60.1683 29.1776 58.2552 31.0709C56.3422 32.9643 53.3543 35.7747 49.2915 39.5022C45.1893 35.7747 42.1718 32.9643 40.239 31.0709C38.3062 29.1776 36.3636 26.8208 34.4111 24.0005C32.4586 21.1802 31.502 18.7544 31.5415 16.723C31.5415 14.0408 32.498 11.7727 34.4111 9.91884C36.3241 8.06495 38.6316 7.07884 41.3336 6.96051C44.4891 6.96051 47.1418 8.17343 49.2915 10.5993ZM4.86914 33.5855H16.7498V66.1272H4.86914V33.5855Z" fill="#F34DBD"/>
                    </svg>

                </div>
                <h4 class="mt-4 text-lg font-semibold text-gray-900">Premium Products</h4>
                <p class="text-gray-600 mt-2 text-sm">
                    We use only the finest nail care products and polishes from trusted brands
                </p>
            </div>
        </div>
        
    </div>
</section>

<!-- Our Work Gallery Panoramic Styling -->
<section id="gallery" class="scroll-mt-24 relative bg-white py-16 px-6 overflow-hidden">
  <div class="max-w-6xl mx-auto text-center">
    <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Our Work Gallery</h2>
    <p class="text-gray-600 mt-4 max-w-2xl mx-auto">
      Discover the artistry and precision that goes into every service. From classic elegance to creative nail art,
      see why our clients love their results.
    </p>

    <!-- Panoramic Marquee Row -->
    <div class="relative mt-12 max-w-6xl mx-auto overflow-hidden">
      <!-- Top Mask -->
      <div class="pointer-events-none hidden md:block absolute -top-10 left-1/2 -translate-x-1/2
                  w-[130%] lg:w-[115%] h-24 bg-white rounded-b-[100%] z-20"></div>

      <!-- Marquee wrapper -->
      <div class="relative z-10">
        <div class="flex animate-marquee gap-8 md:gap-12 w-max">

          <!-- One full loop of images -->
          @for ($i = 0; $i < 2; $i++)
            @foreach (range(1, 9) as $num)
              <figure class="w-[280px] h-[280px] rounded-xl overflow-hidden shadow-lg">
                <img src="/images/gallery{{ $num }}.jpg" alt="Nail Art {{ $num }}"
                     class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
              </figure>
            @endforeach
          @endfor

        </div>
      </div>

      <!-- Bottom Mask -->
      <div class="pointer-events-none hidden md:block absolute -bottom-12 left-1/2 -translate-x-1/2
                  w-[130%] lg:w-[115%] h-24 bg-white rounded-t-[100%] z-20"></div>
    </div>

    <!-- CTA -->
    <div class="mt-5">
      <p class="text-gray-700 text-lg mb-4">Ready to create your own masterpiece?</p>
      <a href="{{ url('/bookings') }}"
         class="px-8 py-3 bg-pink-600 hover:bg-pink-700 text-white rounded-lg shadow-lg transition">
        Book Now
      </a>
    </div>
  </div>
</section>



<!-- Our Services -->
<section id="services" class="relative bg-white pt-40 pb-0">
  
    <div class="absolute inset-x-0 -top-[70px] pointer-events-none z-10">
        <!-- cubic Bezier curves -->
        <svg viewBox="0 0 1440 260" preserveAspectRatio="none" class="w-full h-[260px]">
        <path d="
            M0,180
            C40,140 80,60 200,70
            C320,80 360,120 460,120
            C560,120 640,40 760,50
            C880,60 960,160 1060,170
            C1160,180 1240,140 1400,120
            L1440,100 L1440,260 L0,260 Z"
            fill="#FDE4F5" />
        </svg>
    </div>

  
    <div class="relative z-20 bg-[#FBE7F3] max-w-auto mx-auto text-center pb-[120px] pt-[120px] px-6">
        <!-- Title -->
        <h2 class="font-serif text-3xl md:text-4xl font-medium text-gray-900">Our Services</h2>

        <!-- Subtitle -->
        <p class="text-gray-600 mt-4 max-w-2xl mx-auto leading-relaxed">
        Experience the artistry of nail perfection with our curated collection of luxury services.
        </p>

        <!-- Cards -->
        <div class="mt-12 max-w-auto px-2 md:px-0">
            <!-- Mobile: horizontal scroll, Desktop: grid -->
            <div class="flex md:grid md:grid-cols-3 gap-6 md:gap-8 overflow-x-auto snap-x snap-mandatory scroll-smooth md:overflow-visible pb-4">


            
                @foreach($services as $service)
                    <article class="min-w-[85%] sm:min-w-[70%] md:min-w-0 snap-start bg-white rounded-xl shadow-md hover:shadow-xl border border-gray-100 transition transform hover:-translate-y-1">
                        <div class="flex justify-between px-6 py-3 text-xs text-gray-500 uppercase tracking-wide">
                            <span class="font-bold">{{ $service->duration }}</span>
                            <span class="font-bold text-gray-800">{{ $service->price }}</span>
                        </div>

                        <div class="w-full h-[360px] bg-gray-100">
                            <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="w-full h-full object-cover">
                        </div>

                        <div class="p-6 text-left">
                            <h3 class="font-serif text-lg text-gray-900 mb-2">{{ $service->title }}</h3>
                            <p class="text-sm text-gray-600 mb-3">{{ $service->description }}</p>

                            @if($service->features && is_array(json_decode($service->features, true)))
                                <ul class="list-disc list-inside text-gray-600">
                                    @foreach(json_decode($service->features, true) as $feature)
                                        <li>{{ $feature }}</li>
                                    @endforeach
                                </ul>
                            @endif


                            <a href="{{ url('/bookings') }}" class="inline-block mt-5 px-5 py-2 bg-pink-600 text-white rounded-md shadow-sm hover:bg-pink-700 transition">
                                Book Service
                            </a>
                        </div>
                    </article>
                @endforeach
            
            <!-- Card 1 -->
            {{-- <article class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden hover:shadow-xl transition transform hover:-translate-y-1">
                <!-- header -->
                <div class="flex justify-between items-center px-6 py-3 text-xs text-gray-500 uppercase tracking-wide">
                    <span>60 min</span>
                    <span class="font-semibold text-gray-800">From N15,000</span>
                </div>

                <!-- image -->
                <div class="w-full h-[360px] overflow-hidden bg-gray-100">
                    <img src="/images/service1.jpg" alt="Acrylic short Nails" class="w-full h-full object-cover">
                </div>

                <!-- body -->
                <div class="p-6 text-left">
                    <h3 class="font-serif text-lg text-gray-900 mb-2">Acrylic short Nails</h3>
                    <p class="text-sm text-gray-600 mb-3">
                        Our most popular service featuring Acrylic  application with free Nail Kit Long-lasting results for up to 3 weeks.
                    </p>

                    <ul class="text-xs text-gray-500 space-y-1 mb-4">
                        <li><span class="font-semibold text-gray-700">What's Included:</span> Premium gel polish</li>
                        <li>Cuticle treatment</li>
                        <li>Hand massage</li>
                        <li>Nail strengthening</li>
                    </ul>

                    <a href="#bookings" class="inline-block px-5 py-2 bg-pink-600 text-white rounded-md shadow-sm hover:bg-pink-700 transition">
                        Book Service
                    </a>
                </div>
            </article> --}}

            <!-- Card 2 -->
            {{-- <article class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden hover:shadow-xl transition transform hover:-translate-y-1">
                <div class="flex justify-between items-center px-6 py-3 text-xs text-gray-500 uppercase tracking-wide">
                    <span>40 min</span>
                    <span class="font-semibold text-gray-800">From 9,000</span>
                </div>

                <div class="w-full h-[360px] overflow-hidden bg-gray-100">
                    <img src="/images/service2.jpg" alt="Gel Nails" class="w-full h-full object-cover">
                </div>

                <div class="p-6 text-left">
                    <h3 class="font-serif text-lg text-gray-900 mb-2">Gel Nails</h3>
                    <p class="text-sm text-gray-600 mb-3">
                        Our most popular service featuring Acrylic  application with free Nail Kit Long-lasting results for up to 3 weeks.
                    </p>

                    <ul class="text-xs text-gray-500 space-y-1 mb-4">
                        <li><span class="font-semibold text-gray-700">What's Included:</span> Premium gel polish</li>
                        <li>Cuticle treatment</li>
                        <li>Hand massage</li>
                        <li>Nail strengthening</li>
                    </ul>

                    <a href="#bookings" class="inline-block px-5 py-2 bg-pink-600 text-white rounded-md shadow-sm hover:bg-pink-700 transition">
                        Book Service
                    </a>
                </div>
            </article> --}}

            <!-- Card 3 -->
            {{-- <article class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden hover:shadow-xl transition transform hover:-translate-y-1">
                <div class="flex justify-between items-center px-6 py-3 text-xs text-gray-500 uppercase tracking-wide">
                    <span>60 min</span>
                    <span class="font-semibold text-gray-800">From N15,000</span>
                </div>

                <div class="w-full h-[360px] overflow-hidden bg-gray-100">
                    <img src="/images/service3.jpg" alt="Acrylic short Nails" class="w-full h-full object-cover">
                </div>

                <div class="p-6 text-left">
                    <h3 class="font-serif text-lg text-gray-900 mb-2">Acrylic short Nails</h3>
                    <p class="text-sm text-gray-600 mb-3">
                        Our most popular service featuring Acrylic application with free Nail Kit. Long-lasting results for up to 3 weeks.
                    </p>

                    <ul class="text-xs text-gray-500 space-y-1 mb-4">
                        <li><span class="font-semibold text-gray-700">What's Included:</span> Premium gel polish</li>
                        <li>Cuticle treatment</li>
                        <li>Hand massage</li>
                        <li>Nail strengthening</li>
                    </ul>

                    <a href="#bookings" class="inline-block px-5 py-2 bg-pink-600 text-white rounded-md shadow-sm hover:bg-pink-700 transition">
                        Book Service
                    </a>
                </div>
            </article> --}}

        </div>
    </div>
</section>

<style>
  .no-scrollbar::-webkit-scrollbar {
    display: none;
  }
  .no-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
  }
</style>


<!-- Testimonials -->
<section id="testimonial" class="relative bg-[#FDEEFF] py-16 px-6">

    <div class="max-w-6xl mx-auto text-center pb-[120px] px-6">
        <!-- Title -->
        <h2 class="font-serif text-3xl md:text-4xl font-medium text-gray-900">What Our Clients Say</h2>


        <!-- Testimonial Cards -->
        <div class="mt-12 px-2 md:px-0">
            <div class="flex no-scrollbar md:grid md:grid-cols-3 gap-6 md:gap-8 overflow-x-auto snap-x snap-mandatory scroll-smooth md:overflow-visible pb-4">


                <!-- Testimonial Card 1 -->
                <article class="min-w-[85%] sm:min-w-[70%] md:min-w-0 snap-start bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden hover:shadow-xl transition transform hover:-translate-y-1">
                    <!-- stars -->
                    <div class="flex justify-center items-center px-6 py-3 text-xs text-gray-500 uppercase tracking-wide">
                        <svg width="132" height="24" viewBox="0 0 132 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 20.0993L17.8198 23.7824C18.8856 24.4574 20.1898 23.4595 19.9094 22.1976L18.3667 15.2716L23.5134 10.6054C24.453 9.75433 23.9482 8.14023 22.7141 8.03751L15.9407 7.43589L13.2902 0.891426C12.8134 -0.297142 11.1866 -0.297142 10.7098 0.891426L8.05935 7.42122L1.28591 8.02284C0.051828 8.12555 -0.453025 9.73966 0.486562 10.5907L5.63325 15.257L4.09065 22.1829C3.81017 23.4449 5.11437 24.4427 6.18017 23.7677L12 20.0993Z" fill="#FFCD29"/>
                            <path d="M39 20.0993L44.8198 23.7824C45.8856 24.4574 47.1898 23.4595 46.9094 22.1976L45.3667 15.2716L50.5134 10.6054C51.453 9.75433 50.9482 8.14023 49.7141 8.03751L42.9407 7.43589L40.2902 0.891426C39.8134 -0.297142 38.1866 -0.297142 37.7098 0.891426L35.0593 7.42122L28.2859 8.02284C27.0518 8.12555 26.547 9.73966 27.4866 10.5907L32.6333 15.257L31.0906 22.1829C30.8102 23.4449 32.1144 24.4427 33.1802 23.7677L39 20.0993Z" fill="#FFCD29"/>
                            <path d="M66 20.0993L71.8198 23.7824C72.8856 24.4574 74.1898 23.4595 73.9094 22.1976L72.3667 15.2716L77.5134 10.6054C78.453 9.75433 77.9482 8.14023 76.7141 8.03751L69.9407 7.43589L67.2902 0.891426C66.8134 -0.297142 65.1866 -0.297142 64.7098 0.891426L62.0593 7.42122L55.2859 8.02284C54.0518 8.12555 53.547 9.73966 54.4866 10.5907L59.6333 15.257L58.0906 22.1829C57.8102 23.4449 59.1144 24.4427 60.1802 23.7677L66 20.0993Z" fill="#FFCD29"/>
                            <path d="M93 20.0993L98.8198 23.7824C99.8856 24.4574 101.19 23.4595 100.909 22.1976L99.3667 15.2716L104.513 10.6054C105.453 9.75433 104.948 8.14023 103.714 8.03751L96.9407 7.43589L94.2902 0.891426C93.8134 -0.297142 92.1866 -0.297142 91.7098 0.891426L89.0593 7.42122L82.2859 8.02284C81.0518 8.12555 80.547 9.73966 81.4866 10.5907L86.6333 15.257L85.0906 22.1829C84.8102 23.4449 86.1144 24.4427 87.1802 23.7677L93 20.0993Z" fill="#FFCD29"/>
                            <path d="M120 20.0993L125.82 23.7824C126.886 24.4574 128.19 23.4595 127.909 22.1976L126.367 15.2716L131.513 10.6054C132.453 9.75433 131.948 8.14023 130.714 8.03751L123.941 7.43589L121.29 0.891426C120.813 -0.297142 119.187 -0.297142 118.71 0.891426L116.059 7.42122L109.286 8.02284C108.052 8.12555 107.547 9.73966 108.487 10.5907L113.633 15.257L112.091 22.1829C111.81 23.4449 113.114 24.4427 114.18 23.7677L120 20.0993Z" fill="#FFCD29"/>
                        </svg>
                    </div>
                    


                    <!-- body -->
                    <div class="p-6 text-center">
                        <h3 class="font-serif text-lg text-gray-900 mb-2">
                            "Absolutely incredible experience! The attention to detail and artistry is unmatched."
                        </h3>
                    
                        <h3 class="font-serif text-2xl text-gray-900 mt-5 mb-2">
                            Sarah Johnson
                        </h3>
                    </div>
                </article>

                <!-- Testimonial Card 2 -->
                <article class="min-w-[85%] sm:min-w-[70%] md:min-w-0 snap-start bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden hover:shadow-xl transition transform hover:-translate-y-1">
                    <div class="flex justify-center items-center px-6 py-3 text-xs text-gray-500 uppercase tracking-wide">
                        <svg width="132" height="24" viewBox="0 0 132 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 20.0993L17.8198 23.7824C18.8856 24.4574 20.1898 23.4595 19.9094 22.1976L18.3667 15.2716L23.5134 10.6054C24.453 9.75433 23.9482 8.14023 22.7141 8.03751L15.9407 7.43589L13.2902 0.891426C12.8134 -0.297142 11.1866 -0.297142 10.7098 0.891426L8.05935 7.42122L1.28591 8.02284C0.051828 8.12555 -0.453025 9.73966 0.486562 10.5907L5.63325 15.257L4.09065 22.1829C3.81017 23.4449 5.11437 24.4427 6.18017 23.7677L12 20.0993Z" fill="#FFCD29"/>
                            <path d="M39 20.0993L44.8198 23.7824C45.8856 24.4574 47.1898 23.4595 46.9094 22.1976L45.3667 15.2716L50.5134 10.6054C51.453 9.75433 50.9482 8.14023 49.7141 8.03751L42.9407 7.43589L40.2902 0.891426C39.8134 -0.297142 38.1866 -0.297142 37.7098 0.891426L35.0593 7.42122L28.2859 8.02284C27.0518 8.12555 26.547 9.73966 27.4866 10.5907L32.6333 15.257L31.0906 22.1829C30.8102 23.4449 32.1144 24.4427 33.1802 23.7677L39 20.0993Z" fill="#FFCD29"/>
                            <path d="M66 20.0993L71.8198 23.7824C72.8856 24.4574 74.1898 23.4595 73.9094 22.1976L72.3667 15.2716L77.5134 10.6054C78.453 9.75433 77.9482 8.14023 76.7141 8.03751L69.9407 7.43589L67.2902 0.891426C66.8134 -0.297142 65.1866 -0.297142 64.7098 0.891426L62.0593 7.42122L55.2859 8.02284C54.0518 8.12555 53.547 9.73966 54.4866 10.5907L59.6333 15.257L58.0906 22.1829C57.8102 23.4449 59.1144 24.4427 60.1802 23.7677L66 20.0993Z" fill="#FFCD29"/>
                            <path d="M93 20.0993L98.8198 23.7824C99.8856 24.4574 101.19 23.4595 100.909 22.1976L99.3667 15.2716L104.513 10.6054C105.453 9.75433 104.948 8.14023 103.714 8.03751L96.9407 7.43589L94.2902 0.891426C93.8134 -0.297142 92.1866 -0.297142 91.7098 0.891426L89.0593 7.42122L82.2859 8.02284C81.0518 8.12555 80.547 9.73966 81.4866 10.5907L86.6333 15.257L85.0906 22.1829C84.8102 23.4449 86.1144 24.4427 87.1802 23.7677L93 20.0993Z" fill="#FFCD29"/>
                            <path d="M120 20.0993L125.82 23.7824C126.886 24.4574 128.19 23.4595 127.909 22.1976L126.367 15.2716L131.513 10.6054C132.453 9.75433 131.948 8.14023 130.714 8.03751L123.941 7.43589L121.29 0.891426C120.813 -0.297142 119.187 -0.297142 118.71 0.891426L116.059 7.42122L109.286 8.02284C108.052 8.12555 107.547 9.73966 108.487 10.5907L113.633 15.257L112.091 22.1829C111.81 23.4449 113.114 24.4427 114.18 23.7677L120 20.0993Z" fill="#FFCD29"/>
                        </svg>
                    </div>


                    <!-- body -->
                    <div class="p-6 text-center">
                        <h3 class="font-serif text-lg text-gray-900 mb-2">
                            "I&apos;ve never had my nails look this perfect. The team at Zeeva is truly talented."
                        </h3>
                    
                        <h3 class="font-serif text-2xl text-gray-900 mt-5 mb-2">
                            Odebode Mayowa
                        </h3>
                    </div>
                </article>

                <!-- Testimonial Card 3 -->
                <article class="min-w-[85%] sm:min-w-[70%] md:min-w-0 snap-start bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden hover:shadow-xl transition transform hover:-translate-y-1">
                    <div class="flex justify-center items-center px-6 py-3 text-xs text-gray-500 uppercase tracking-wide">
                        <svg width="132" height="24" viewBox="0 0 132 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 20.0993L17.8198 23.7824C18.8856 24.4574 20.1898 23.4595 19.9094 22.1976L18.3667 15.2716L23.5134 10.6054C24.453 9.75433 23.9482 8.14023 22.7141 8.03751L15.9407 7.43589L13.2902 0.891426C12.8134 -0.297142 11.1866 -0.297142 10.7098 0.891426L8.05935 7.42122L1.28591 8.02284C0.051828 8.12555 -0.453025 9.73966 0.486562 10.5907L5.63325 15.257L4.09065 22.1829C3.81017 23.4449 5.11437 24.4427 6.18017 23.7677L12 20.0993Z" fill="#FFCD29"/>
                            <path d="M39 20.0993L44.8198 23.7824C45.8856 24.4574 47.1898 23.4595 46.9094 22.1976L45.3667 15.2716L50.5134 10.6054C51.453 9.75433 50.9482 8.14023 49.7141 8.03751L42.9407 7.43589L40.2902 0.891426C39.8134 -0.297142 38.1866 -0.297142 37.7098 0.891426L35.0593 7.42122L28.2859 8.02284C27.0518 8.12555 26.547 9.73966 27.4866 10.5907L32.6333 15.257L31.0906 22.1829C30.8102 23.4449 32.1144 24.4427 33.1802 23.7677L39 20.0993Z" fill="#FFCD29"/>
                            <path d="M66 20.0993L71.8198 23.7824C72.8856 24.4574 74.1898 23.4595 73.9094 22.1976L72.3667 15.2716L77.5134 10.6054C78.453 9.75433 77.9482 8.14023 76.7141 8.03751L69.9407 7.43589L67.2902 0.891426C66.8134 -0.297142 65.1866 -0.297142 64.7098 0.891426L62.0593 7.42122L55.2859 8.02284C54.0518 8.12555 53.547 9.73966 54.4866 10.5907L59.6333 15.257L58.0906 22.1829C57.8102 23.4449 59.1144 24.4427 60.1802 23.7677L66 20.0993Z" fill="#FFCD29"/>
                            <path d="M93 20.0993L98.8198 23.7824C99.8856 24.4574 101.19 23.4595 100.909 22.1976L99.3667 15.2716L104.513 10.6054C105.453 9.75433 104.948 8.14023 103.714 8.03751L96.9407 7.43589L94.2902 0.891426C93.8134 -0.297142 92.1866 -0.297142 91.7098 0.891426L89.0593 7.42122L82.2859 8.02284C81.0518 8.12555 80.547 9.73966 81.4866 10.5907L86.6333 15.257L85.0906 22.1829C84.8102 23.4449 86.1144 24.4427 87.1802 23.7677L93 20.0993Z" fill="#FFCD29"/>
                            <path d="M120 20.0993L125.82 23.7824C126.886 24.4574 128.19 23.4595 127.909 22.1976L126.367 15.2716L131.513 10.6054C132.453 9.75433 131.948 8.14023 130.714 8.03751L123.941 7.43589L121.29 0.891426C120.813 -0.297142 119.187 -0.297142 118.71 0.891426L116.059 7.42122L109.286 8.02284C108.052 8.12555 107.547 9.73966 108.487 10.5907L113.633 15.257L112.091 22.1829C111.81 23.4449 113.114 24.4427 114.18 23.7677L120 20.0993Z" fill="#FFCD29"/>
                        </svg>
                    </div>


                    <!-- body -->
                    <div class="p-6 text-center">
                        <h3 class="font-serif text-lg text-gray-900 mb-2">
                            "A luxurious experience from start to finish. I wouldn&apos;t go anywhere <br />else!"
                        </h3>
                    
                        <h3 class="font-serif text-2xl text-gray-900 mt-5 mb-2">
                            Ademide Akinlabi
                        </h3>
                    </div>
                </article>

            </div>
        </div>
    </div>
</section>



<!-- Footer -->
<x-footer />

<script>
  const sections = document.querySelectorAll("section");
  const navLinks = document.querySelectorAll(".nav-link");

  window.addEventListener("scroll", () => {
    let current = "";

    sections.forEach((section) => {
      const sectionTop = section.offsetTop - 100; // offset for navbar height
      const sectionHeight = section.clientHeight;

      if (window.scrollY >= sectionTop && window.scrollY < sectionTop + sectionHeight) {
        current = section.getAttribute("id");
      }
    });

    navLinks.forEach((link) => {
      link.classList.remove("text-pink-600", "font-semibold"); // remove active
      if (link.getAttribute("href") === `#${current}`) {
        link.classList.add("text-pink-600", "font-semibold"); // active link
      }
    });
  });


  document.addEventListener('DOMContentLoaded', () => {
  const urlParams = new URLSearchParams(window.location.search);
  const scrollTo = urlParams.get('scrollTo');

  if (scrollTo) {
    const targetElem = document.getElementById(scrollTo);
    if (targetElem) {
      targetElem.scrollIntoView({ behavior: 'smooth' });

      // Remove query param after scrolling, keep pathname and hash clean
      urlParams.delete('scrollTo');
      const newUrl = window.location.pathname + (urlParams.toString() ? '?' + urlParams.toString() : '');
      history.replaceState(null, '', newUrl);
    }
  }
});

</script>


</body>
</html>
