<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Now | Zeeva Nails</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  @vite('resources/css/app.css')
</head>
<body class="relative min-h-screen bg-[#FEEDF8] overflow-x-hidden">


  <!-- Navbar -->
  <x-navbar />



<!-- Book Section -->
<section id="book-section" class="bg-[#FEEDF8] pt-40 py-16">
  <div class="max-w-7xl mx-auto px-6">
    <!-- Title -->
    <div class="text-center mb-10">
      <h2 class="text-4xl font-semibold text-gray-900">Book Your Appointment</h2>
      <p class="text-gray-600 mt-2">Reserve your spot for a luxurious nail experience</p>
    </div>

    <!-- Form -->
    <form id="book-form" action="{{ route('bookings.store') }}" method="POST" class="space-y-6">
      @csrf
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Full Name -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Full Name</label>
          <input type="text" name="full_name" required placeholder="Enter Your Full Name"
            class="mt-2 w-full rounded-md border border-gray-300 bg-pink-50 px-4 py-3 text-gray-700 placeholder-gray-400 focus:border-pink-400 focus:ring-2 focus:ring-pink-200 outline-none">
        </div>

        <!-- Email Address -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Email Address</label>
          <input type="email" name="email" required placeholder="Email Address"
            class="mt-2 w-full rounded-md border border-gray-300 bg-pink-50 px-4 py-3 text-gray-700 placeholder-gray-400 focus:border-pink-400 focus:ring-2 focus:ring-pink-200 outline-none">
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Phone Number -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Phone Number</label>
          <input type="text" name="phone" required placeholder="Phone number"
            class="mt-2 w-full rounded-md border border-gray-300 bg-pink-50 px-4 py-3 text-gray-700 placeholder-gray-400 focus:border-pink-400 focus:ring-2 focus:ring-pink-200 outline-none">
        </div>

        <!-- Select Services -->
        <div x-data="{ open: false, services: [] }" class="w-full relative">
          <label class="block text-sm font-medium text-gray-700">Select Services</label>

          <!-- Custom Select -->
          <div 
            @click="open = !open"
            class="mt-2 w-full rounded-md border border-gray-300 bg-pink-50 px-4 py-3 text-gray-700 cursor-pointer focus-within:border-pink-400 focus-within:ring-2 focus-within:ring-pink-200"
          >
            <span x-text="services.length > 0 ? services.join(', ') : 'Choose Your Service'"></span>
          </div>

          <!-- Dropdown -->
          <div 
            x-show="open"
            @click.away="open = false"
            class="absolute z-10 mt-1 w-full bg-white border border-gray-300 rounded-md shadow-lg max-h-48 overflow-y-auto"
          >
            <label class="flex items-center px-4 py-2 cursor-pointer hover:bg-pink-50">
              <input type="checkbox" value="Long acrylic nails" x-model="services"
                class="mr-2 rounded border-gray-300 text-pink-500 focus:ring-pink-400">
              <span>Long acrylic nails</span>
            </label>

            <label class="flex items-center px-4 py-2 cursor-pointer hover:bg-pink-50">
              <input type="checkbox" value="Short acrylic nails" x-model="services"
                class="mr-2 rounded border-gray-300 text-pink-500 focus:ring-pink-400">
              <span>Short acrylic nails</span>
            </label>

            <label class="flex items-center px-4 py-2 cursor-pointer hover:bg-pink-50">
              <input type="checkbox" value="Short Gel nails" x-model="services"
                class="mr-2 rounded border-gray-300 text-pink-500 focus:ring-pink-400">
              <span>Short Gel nails</span>
            </label>
            <label class="flex items-center px-4 py-2 cursor-pointer hover:bg-pink-50">
              <input type="checkbox" value="Long gel nails" x-model="services"
                class="mr-2 rounded border-gray-300 text-pink-500 focus:ring-pink-400">
              <span>Long gel nails</span>
            </label>

            <label class="flex items-center px-4 py-2 cursor-pointer hover:bg-pink-50">
              <input type="checkbox" value="Male manicure" x-model="services"
                class="mr-2 rounded border-gray-300 text-pink-500 focus:ring-pink-400">
              <span>Male manicure</span>
            </label>

            <label class="flex items-center px-4 py-2 cursor-pointer hover:bg-pink-50">
              <input type="checkbox" value="acrylic toe plain" x-model="services"
                class="mr-2 rounded border-gray-300 text-pink-500 focus:ring-pink-400">
              <span>acrylic toe plain</span>
            </label>
          </div>

          <!-- Hidden input for form submission -->
          <input type="hidden" name="services" :value="services.join(', ')">
        </div>
      </div>
      

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Preferred Date -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Preferred date</label>
          <input type="date" name="preferred_date" required
            class="mt-2 w-full rounded-md border border-gray-300 bg-pink-50 px-4 py-3 text-gray-700 placeholder-gray-400 focus:border-pink-400 focus:ring-2 focus:ring-pink-200 outline-none">
        </div>

        <!-- Preferred Time -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Preferred Time</label>
          <select name="preferred_time" type="time" required
            class="mt-2 w-full rounded-md border border-gray-300 bg-pink-50 px-4 py-3 text-gray-700 focus:border-pink-400 focus:ring-2 focus:ring-pink-200 outline-none">
            <option value="">Choose Time</option>
            <option>10:00 AM</option>
            <option>12:00 PM</option>
            <option>3:00 PM</option>
          </select>
        </div>
      </div>

      <!-- Special Request -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Special Request (Optional)</label>
        <textarea name="request" rows="3" placeholder="Any Special Request"
          class="mt-2 w-full rounded-md border border-gray-300 bg-pink-50 px-4 py-3 text-gray-700 placeholder-gray-400 focus:border-pink-400 focus:ring-2 focus:ring-pink-200 outline-none"></textarea>
      </div>

      <!-- Confirm Button -->
      <div class="text-center">
        <button type="submit" id="submitBtn"
          class="w-full rounded-md border border-gray-400 bg-pink-100 px-6 py-4 text-gray-800 font-medium hover:bg-pink-200 focus:outline-none focus:ring-2 focus:ring-pink-300">
          <span id="btnText">Confirm Appointment</span>
          <svg id="loading" class="hidden animate-spin h-5 w-5 text-pink-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
          </svg>
        </button>
      </div>
    </form>
  </div>
</section>

<!--Confirmation -->
<section id="confirmation-section" class="bg-[#FEEDF8] py-20 pt-60 text-center hidden">
  <div class="max-w-5xl mx-auto relative">

    <!-- Floating Heart Icons -->
    <div class="absolute -left-6 top-1/3">
      <!-- Left Heart -->
      <svg width="25" height="23" viewBox="0 0 25 23" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g filter="url(#filter0_iii_235_264)">
          <path d="M1.50711 8.9555C0.0320939 12.2983 1.54625 16.2039 4.88905 17.6789L10.5136 20.1444C14.1539 21.7401 15.9741 22.5379 17.6023 21.9044C19.2305 21.2709 20.0328 19.4527 21.6373 15.8163L24.102 10.2307C25.577 6.88787 24.0628 2.98225 20.72 1.50724C17.3772 0.0322233 13.4716 1.54637 11.9966 4.88918L11.456 6.11429L10.2305 5.57356C6.88774 4.09854 2.98212 5.61269 1.50711 8.9555Z" fill="#FC7950"/>
        </g>
      </svg>
    </div>

    <div class="absolute -left-6 top-27/24">
      <!-- Left Down Heart -->
      <svg width="25" height="23" viewBox="0 0 25 23" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g filter="url(#filter0_iii_235_264)">
          <path d="M1.50711 8.9555C0.0320939 12.2983 1.54625 16.2039 4.88905 17.6789L10.5136 20.1444C14.1539 21.7401 15.9741 22.5379 17.6023 21.9044C19.2305 21.2709 20.0328 19.4527 21.6373 15.8163L24.102 10.2307C25.577 6.88787 24.0628 2.98225 20.72 1.50724C17.3772 0.0322233 13.4716 1.54637 11.9966 4.88918L11.456 6.11429L10.2305 5.57356C6.88774 4.09854 2.98212 5.61269 1.50711 8.9555Z" fill="#FC7950"/>
        </g>
      </svg>
    </div>

    <div class="absolute -right-6 bottom-1/4">
      <!-- Right Heart -->
      <svg width="25" height="23" viewBox="0 0 25 23" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g filter="url(#filter0_iii_235_264)">
          <path d="M1.50711 8.9555C0.0320939 12.2983 1.54625 16.2039 4.88905 17.6789L10.5136 20.1444C14.1539 21.7401 15.9741 22.5379 17.6023 21.9044C19.2305 21.2709 20.0328 19.4527 21.6373 15.8163L24.102 10.2307C25.577 6.88787 24.0628 2.98225 20.72 1.50724C17.3772 0.0322233 13.4716 1.54637 11.9966 4.88918L11.456 6.11429L10.2305 5.57356C6.88774 4.09854 2.98212 5.61269 1.50711 8.9555Z" fill="#FC7950"/>
        </g>
      </svg>
    </div>

    <!-- Success Badge Icon -->
    <div class="flex justify-center mb-8">
      <svg width="120" height="120" viewBox="0 0 264 276" fill="none" xmlns="http://www.w3.org/2000/svg">
        <mask id="mask0_254_61" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="-1" width="264" height="278">
          <path d="M132 2.16663L167.677 28.1923L211.843 28.1108L225.406 70.1376L261.185 96.0275L247.459 138L261.185 179.972L225.406 205.862L211.843 247.889L167.677 247.808L132 273.833L96.3236 247.808L52.1574 247.889L38.5944 205.862L2.81592 179.972L16.5419 138L2.81592 96.0275L38.5944 70.1376L52.1574 28.1108L96.3236 28.1923L132 2.16663Z" fill="white" stroke="white" stroke-width="4.34667" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M84.4585 138L118.417 171.958L186.333 104.042" stroke="black" stroke-width="4.34667" stroke-linecap="round" stroke-linejoin="round"/>
        </mask>
        <g mask="url(#mask0_254_61)">
          <path d="M-31 -25H295V301H-31V-25Z" fill="#F34DBD"/>
        </g>
      </svg>
    </div>

    <!-- Confirmation Text -->
    <h2 class="text-2xl font-semibold text-gray-900 mb-3">Appointment Confirmed!</h2>
    <p class="text-gray-600 mb-6">Your appointment has been successfully booked. We can't wait to pamper you!</p>
    <p class="text-lg font-semibold text-gray-800">
      Confirmation Code : <span id="confirmation-code" class="font-bold"></span>
    </p>

  </div>
</section>

<!-- Location Section -->
<section class="bg-[#FEEDF8] pt-10 py-16">
  <div class="max-w-7xl mx-auto px-6">
    <!-- Visit -->
    <div class="text-center mb-10">
      <h2 class="text-2xl font-semibold text-gray-900">Visit Our Studio</h2>
      <p class="text-gray-600 text-xl mt-2">Monday - Saturday: 9:00 AM - 7:00 PM <br /> Sunday: 1:00PM - 5:00 PM</p>
    </div>

    <!-- Address -->
    <div class="text-center pt-10 mb-10">
      <h2 class="text-2xl font-semibold text-gray-900"><i class="fas fa-map-marker-alt text-pink-600"></i> Address</h2>
    </div>

    <!-- Map -->
    <div class="w-full h-80 rounded-lg overflow-hidden shadow-lg border border-gray-300">
      <iframe
        class="w-full h-full"
        frameborder="0"
        style="border:0"
        allowfullscreen
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.2336432319994!2d3.3974866733291518!3d6.617869622062952!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b933d548ba131%3A0xf91d9e81ef4c0100!2sMagodo%20St%2C%20Ikosi%20Ketu%2C%20Ikosi%20Ketu%2FMile%2012%2FAgiliti%2FMaidan%20105102%2C%20Lagos%2C%20Nigeria!5e0!3m2!1sen!2sch!4v1757063840319!5m2!1sen!2sch">
      </iframe>
    </div>

  </div>
</section>



<!-- Custom Alert -->
<div id="customAlert" class="fixed top-6 right-6 hidden px-4 py-3 rounded-lg shadow-lg z-50 transition-all duration-300">
  <span id="customAlertMessage"></span>
</div>



<!-- Footer -->
<x-footer />

<!-- Alpine.js -->
<script src="https://unpkg.com/alpinejs" defer></script>

<!-- Script -->
<script>
const form = document.getElementById("book-form");
const btn = document.getElementById("submitBtn");
const btnText = document.getElementById("btnText");
const loading = document.getElementById("loading");
const confirmationSection = document.getElementById("confirmation-section");
const bookSection = document.getElementById("book-section");
const confirmationCodeSpan = document.getElementById("confirmation-code");

const customAlert = document.getElementById("customAlert");
const customAlertMessage = document.getElementById("customAlertMessage");

function showAlert(message, type = "error", duration = 4000) {
  customAlertMessage.textContent = message;

  // Reset classes
  customAlert.className = "fixed top-6 right-6 px-4 py-3 rounded-lg shadow-lg z-50 transition-all duration-300";

  if (type === "success") {
    customAlert.classList.add("bg-green-100", "text-green-800", "border", "border-green-300");
  } else {
    customAlert.classList.add("bg-red-100", "text-red-800", "border", "border-red-300");
  }

  customAlert.classList.remove("hidden", "opacity-0");
  customAlert.classList.add("opacity-100");

  setTimeout(() => {
    customAlert.classList.add("opacity-0");
    setTimeout(() => {
      customAlert.classList.add("hidden");
    }, 300);
  }, duration);
}


form.addEventListener("submit", async function(event) {
  event.preventDefault();
  
  // Loading state
  btn.disabled = true;
  btnText.classList.add("hidden");
  loading.classList.remove("hidden");

  const formData = new FormData(form);

  try {
    let response = await fetch(form.action, {
      method: "POST",
      body: formData,
      headers: { 
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content 
      }
    });

    let data = await response.json();

    if (data.success) {
      confirmationCodeSpan.textContent = data.confirmation_code;

      bookSection.classList.add("hidden");
      confirmationSection.classList.remove("hidden");

      setTimeout(() => {
        confirmationSection.classList.add("hidden");
        bookSection.classList.remove("hidden");
        form.reset();
      }, 5000);
    } else if (data.errors) {
      // Show first validation error
      const firstError = Object.values(data.errors)[0][0];
      showAlert(firstError);

    } else {
      showAlert("Booking failed. Please try again.");
    }

  } catch (error) {
    console.error(error);
    showAlert("Something went wrong. Try again.");
  } finally {
    btn.disabled = false;
    btnText.classList.remove("hidden");
    loading.classList.add("hidden");
  }
});
</script>


</body>
</html>
