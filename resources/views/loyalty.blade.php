<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Loyalty Card | Zeeva Nails</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  @vite('resources/css/app.css')
</head>
<body class="relative min-h-screen bg-[#FEEDF8] overflow-x-hidden">


    <!-- Navbar -->
    <x-navbar />




    

    <!-- Loyalty Section -->
    <section class="relative z-10 text-center px-6 py-16 pt-40 max-w-6xl mx-auto">
        <!-- Floating Icons -->
        <div class="absolute top-35 left-0 animate-float">
            <!-- Glow -->
            <div class="w-10 h-10 bg-pink-400 rounded-full blur-xl opacity-70"></div>
            <!-- Solid Circle -->
            <div class="absolute top-1/2 left-1/2 w-4 h-4 bg-white rounded-full border-3 border-pink-400 transform -translate-x-1/2 -translate-y-1/2"></div>
        </div>

        <div class="absolute bottom-5 left-2 animate-float">
            <div class="w-10 h-10 bg-pink-400 rounded-full blur-xl opacity-70"></div>
            <div class="absolute top-1/2 left-1/2 w-4 h-4 bg-white rounded-full border-3 border-pink-400 transform -translate-x-1/2 -translate-y-1/2"></div>
        </div>

        <div class="absolute top-50 right-0 animate-float">
            <div class="w-10 h-10 bg-pink-400 rounded-full blur-xl opacity-70"></div>
            <div class="absolute top-1/2 left-1/2 w-4 h-4 bg-white rounded-full border-3 border-pink-400 transform -translate-x-1/2 -translate-y-1/2"></div>
        </div>

        <div class="absolute bottom-23 right-2 animate-float">
            <div class="w-10 h-10 bg-pink-400 rounded-full blur-xl opacity-70"></div>
            <div class="absolute top-1/2 left-1/2 w-4 h-4 bg-white rounded-full border-3 border-pink-400 transform -translate-x-1/2 -translate-y-1/2"></div>
        </div>

        <!-- Heading -->
        <h2 class="text-3xl md:text-4xl font-semibold text-gray-900 mb-2">
        How to get Our Loyalty Card
        </h2>
        <p class="text-gray-600 text-lg mb-12">
        Love your nails? Let us love you back.
        </p>

        <!-- Content Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 pt-10 gap-10 items-center">
        
            <!-- Loyalty Card -->
            <div class="max-w-sm mx-auto relative">
                <img src="/icons/loyalty.svg" alt="Loyalty Card" class="w-full h-auto rounded-lg mb-4">
            </div>

            <!-- Benefits -->
            <div class="text-left space-y-6">
                <p class="flex items-center text-gray-800 text-lg">
                    <svg width="28" height="27" viewBox="0 0 28 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.8748 24.625C7.43734 22.9062 4.00046 17.75 2.12484 14.625C0.24921 11.5 4.19546 8.57062 6.49984 10.875L8.99984 13.375V3.6875C8.99984 3.10734 9.2303 2.55094 9.64054 2.1407C10.0508 1.73047 10.6072 1.5 11.1873 1.5C11.7675 1.5 12.3239 1.73047 12.7341 2.1407C13.1444 2.55094 13.3748 3.10734 13.3748 3.6875V9C13.3748 8.41984 13.6053 7.86344 14.0155 7.4532C14.4258 7.04297 14.9822 6.8125 15.5623 6.8125C16.1425 6.8125 16.6989 7.04297 17.1091 7.4532C17.5194 7.86344 17.7498 8.41984 17.7498 9V9.9375C17.7497 9.35734 17.98 8.80087 18.3901 8.39052C18.8002 7.98017 19.3565 7.74954 19.9367 7.74937C20.5169 7.74921 21.0733 7.97952 21.4837 8.38964C21.894 8.79976 22.1247 9.35609 22.1248 9.93625V13.0625C22.1248 12.4823 22.3553 11.9259 22.7655 11.5157C23.1758 11.1055 23.7322 10.875 24.3123 10.875C24.8925 10.875 25.4489 11.1055 25.8591 11.5157C26.2694 11.9259 26.4998 12.4823 26.4998 13.0625V18.5275C26.4998 19.2494 26.3361 19.965 25.9292 20.5613C25.198 21.6325 23.7511 23.3969 21.4998 24.625C18.0623 26.5 14.3123 26.3438 10.8748 24.625Z" stroke="#6D2355" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                &nbsp; Earn 1 point every visit
                </p>
                <p class="flex items-center text-gray-800 text-lg">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.75 9.375C18.75 9.375 19.375 9.375 20 10.625C20 10.625 21.985 7.5 23.75 6.875" stroke="#551B42" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M27.5 8.75C27.5 10.4076 26.8415 11.9973 25.6694 13.1694C24.4973 14.3415 22.9076 15 21.25 15C19.5924 15 18.0027 14.3415 16.8306 13.1694C15.6585 11.9973 15 10.4076 15 8.75C15 7.0924 15.6585 5.50269 16.8306 4.33058C18.0027 3.15848 19.5924 2.5 21.25 2.5C22.9076 2.5 24.4973 3.15848 25.6694 4.33058C26.8415 5.50269 27.5 7.0924 27.5 8.75Z" stroke="#551B42" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9.21746 14.7225L10.1225 14.4775C10.0631 14.2581 9.92612 14.0677 9.73691 13.9418C9.54771 13.8159 9.31919 13.763 9.09389 13.7929C8.86859 13.8229 8.66184 13.9337 8.51212 14.1047C8.36239 14.2757 8.27989 14.4952 8.27996 14.7225H9.21746ZM11.3262 8.43628C11.4493 8.43628 11.5712 8.41203 11.685 8.36492C11.7987 8.3178 11.9021 8.24875 11.9891 8.16169C12.0762 8.07464 12.1452 7.97129 12.1923 7.85755C12.2395 7.7438 12.2637 7.62189 12.2637 7.49878C12.2637 7.37567 12.2395 7.25376 12.1923 7.14001C12.1452 7.02627 12.0762 6.92292 11.9891 6.83587C11.9021 6.74881 11.7987 6.67976 11.685 6.63264C11.5712 6.58553 11.4493 6.56128 11.3262 6.56128V8.43628ZM16.6887 18.1975C16.8931 18.0668 17.0388 17.862 17.0953 17.6261C17.1518 17.3902 17.1146 17.1415 16.9916 16.9324C16.8686 16.7234 16.6694 16.5701 16.4357 16.5048C16.2021 16.4396 15.9522 16.4674 15.7387 16.5825L16.6887 18.1975ZM24.8125 18.4013C24.8125 18.1526 24.7137 17.9142 24.5379 17.7384C24.3621 17.5626 24.1236 17.4638 23.875 17.4638C23.6263 17.4638 23.3879 17.5626 23.212 17.7384C23.0362 17.9142 22.9375 18.1526 22.9375 18.4013H24.8125ZM2.68746 17.2688V20.8325L4.56246 20.8313V17.2688H2.68746ZM10.375 28.4375H17.125V26.5625H10.375V28.4375ZM17.125 28.4375C18.69 28.4375 19.9562 28.44 20.9512 28.3075C21.9725 28.1713 22.8475 27.88 23.545 27.1913L22.2275 25.8563C21.9375 26.1438 21.5225 26.34 20.705 26.4488C19.8612 26.5613 18.7425 26.5625 17.125 26.5625V28.4375ZM22.9375 20.8338C22.9375 22.4313 22.935 23.5338 22.8225 24.365C22.7137 25.165 22.5162 25.5713 22.2275 25.8563L23.545 27.1913C24.245 26.5 24.5425 25.6313 24.68 24.6163C24.815 23.6313 24.8125 22.3788 24.8125 20.8338H22.9375ZM2.68746 20.8325C2.68746 22.3763 2.68496 23.6313 2.81996 24.6175C2.95746 25.63 3.25496 26.5 3.95496 27.1913L5.27246 25.8563C4.98371 25.5713 4.78621 25.1663 4.67746 24.365C4.56496 23.535 4.56246 22.4313 4.56246 20.8338L2.68746 20.8325ZM10.375 26.5625C8.75746 26.5625 7.63746 26.56 6.79496 26.4488C5.97746 26.34 5.56246 26.1438 5.27246 25.8563L3.95496 27.1913C4.65246 27.88 5.52746 28.1713 6.54871 28.3075C7.54371 28.44 8.81121 28.4375 10.375 28.4375V26.5625ZM8.27996 14.7225C8.27996 16.0275 7.19496 17.1175 5.81746 17.1175V18.9925C8.19496 18.9925 10.155 17.0988 10.155 14.7225H8.27996ZM5.81746 17.1175C5.20621 17.1175 4.65121 16.9025 4.22246 16.5475L3.02746 17.9925C3.78246 18.6175 4.75746 18.9925 5.81746 18.9925V17.1175ZM4.22246 16.5475C3.89958 16.283 3.6521 15.9381 3.50496 15.5475L1.74996 16.21C2.01496 16.91 2.45996 17.5225 3.02746 17.9925L4.22246 16.5475ZM13.75 17.1175C11.9737 17.1175 10.525 15.9675 10.1225 14.4775L8.31246 14.9675C8.94746 17.3113 11.165 18.9925 13.75 18.9925V17.1175ZM3.82496 14.17L4.90871 12.3088L3.28871 11.365L2.20496 13.225L3.82496 14.17ZM5.62121 9.67753C5.62121 9.01003 6.17871 8.43753 6.90496 8.43753V6.56253C5.17746 6.56253 3.74621 7.94003 3.74621 9.67753H5.62121ZM4.90871 12.3088C5.37375 11.5097 5.61954 10.602 5.62121 9.67753H3.74621C3.74621 10.2675 3.58871 10.85 3.28871 11.365L4.90871 12.3088ZM3.50496 15.5475C3.47934 15.4876 3.45844 15.4257 3.44246 15.3625C3.43188 15.2602 3.43398 15.1569 3.44871 15.055L1.57996 14.8975C1.55621 15.1775 1.55371 15.42 1.59121 15.6563C1.62871 15.8938 1.70371 16.0825 1.74996 16.2088L3.50496 15.5475ZM2.20496 13.225C1.90246 13.7438 1.64246 14.1725 1.57996 14.8975L3.44871 15.055C3.46996 14.7988 3.51621 14.7013 3.82496 14.17L2.20496 13.225ZM6.90496 8.43753H11.3275V6.56253H6.90496V8.43753ZM15.7375 16.5838C15.1352 16.9376 14.4485 17.122 13.75 17.1175V18.9925C14.8237 18.9925 15.8312 18.7025 16.6887 18.1975L15.7375 16.5838ZM24.8125 20.8338V18.4013H22.9375V20.8338H24.8125Z" fill="#551B42"/>
                        <path d="M3.62496 17.27L4.22246 16.5475M4.22246 16.5475C4.65121 16.9025 5.20621 17.1175 5.81746 17.1175M4.22246 16.5475L3.02746 17.9925M4.22246 16.5475C3.89958 16.283 3.6521 15.9381 3.50496 15.5475M3.62496 20.8325H2.68746M2.68746 20.8325V17.2688H4.56246V20.8313L2.68746 20.8325ZM2.68746 20.8325C2.68746 22.3763 2.68496 23.6313 2.81996 24.6175C2.95746 25.63 3.25496 26.5 3.95496 27.1913M2.68746 20.8325L4.56246 20.8338C4.56246 22.4313 4.56496 23.535 4.67746 24.365C4.78621 25.1663 4.98371 25.5713 5.27246 25.8563M22.8875 26.5238L23.545 27.1913M23.545 27.1913C22.8475 27.88 21.9725 28.1713 20.9512 28.3075C19.9562 28.44 18.69 28.4375 17.125 28.4375M23.545 27.1913L22.2275 25.8563M23.545 27.1913C24.245 26.5 24.5425 25.6313 24.68 24.6163C24.815 23.6313 24.8125 22.3788 24.8125 20.8338M4.61246 26.5238L3.95496 27.1913M3.95496 27.1913L5.27246 25.8563M3.95496 27.1913C4.65246 27.88 5.52746 28.1713 6.54871 28.3075C7.54371 28.44 8.81121 28.4375 10.375 28.4375M10.1225 14.4775L9.21746 14.7225H8.27996M10.1225 14.4775C10.0631 14.2581 9.92612 14.0677 9.73691 13.9418C9.54771 13.8159 9.31919 13.763 9.09389 13.7929C8.86859 13.8229 8.66184 13.9337 8.51211 14.1047C8.36239 14.2757 8.27989 14.4952 8.27996 14.7225M10.1225 14.4775C10.525 15.9675 11.9737 17.1175 13.75 17.1175M10.1225 14.4775L8.31246 14.9675C8.94746 17.3113 11.165 18.9925 13.75 18.9925M8.27996 14.7225C8.27996 16.0275 7.19496 17.1175 5.81746 17.1175M8.27996 14.7225H10.155C10.155 17.0988 8.19496 18.9925 5.81746 18.9925M2.62746 15.8788L3.50496 15.5475M3.50496 15.5475L1.74996 16.21C2.01496 16.91 2.45996 17.5225 3.02746 17.9925M3.50496 15.5475C3.47934 15.4876 3.45844 15.4257 3.44246 15.3625C3.43188 15.2602 3.43398 15.1569 3.44871 15.055M3.50496 15.5475L1.74996 16.2088C1.70371 16.0825 1.62871 15.8938 1.59121 15.6563C1.55371 15.42 1.55621 15.1775 1.57996 14.8975M3.01496 13.6975L3.82496 14.17M3.82496 14.17L4.90871 12.3088M3.82496 14.17L2.20496 13.225M3.82496 14.17C3.51621 14.7013 3.46996 14.7988 3.44871 15.055M4.09871 11.8375L3.28871 11.365M3.28871 11.365L4.90871 12.3088M3.28871 11.365L2.20496 13.225M3.28871 11.365C3.58871 10.85 3.74621 10.2675 3.74621 9.67753M2.51371 14.975L1.57996 14.8963M16.6887 18.1975C16.8931 18.0668 17.0388 17.862 17.0953 17.6261C17.1518 17.3902 17.1146 17.1415 16.9916 16.9324C16.8686 16.7234 16.6694 16.5701 16.4357 16.5048C16.2021 16.4396 15.9522 16.4674 15.7387 16.5825L16.6887 18.1975ZM16.6887 18.1975C15.8312 18.7025 14.8237 18.9925 13.75 18.9925M16.6887 18.1975L15.7375 16.5838C15.1352 16.9376 14.4485 17.122 13.75 17.1175M24.8125 18.4013C24.8125 18.1526 24.7137 17.9142 24.5379 17.7384C24.3621 17.5626 24.1236 17.4638 23.875 17.4638C23.6263 17.4638 23.3879 17.5626 23.212 17.7384C23.0362 17.9142 22.9375 18.1526 22.9375 18.4013M24.8125 18.4013H22.9375M24.8125 18.4013V20.8338M22.9375 18.4013V20.8338M10.375 28.4375H17.125M10.375 28.4375V26.5625M17.125 28.4375V26.5625M17.125 26.5625H10.375M17.125 26.5625C18.7425 26.5625 19.8612 26.5613 20.705 26.4488C21.5225 26.34 21.9375 26.1438 22.2275 25.8563M10.375 26.5625C8.75746 26.5625 7.63746 26.56 6.79496 26.4488C5.97746 26.34 5.56246 26.1438 5.27246 25.8563M22.2275 25.8563C22.5162 25.5713 22.7137 25.165 22.8225 24.365C22.935 23.5338 22.9375 22.4313 22.9375 20.8338M22.9375 20.8338H24.8125M5.81746 17.1175V18.9925M5.81746 18.9925C4.75746 18.9925 3.78246 18.6175 3.02746 17.9925M13.75 17.1175V18.9925M4.90871 12.3088C5.37375 11.5097 5.61954 10.602 5.62121 9.67753M2.20496 13.225C1.90246 13.7438 1.64246 14.1725 1.57996 14.8975M5.62121 9.67753C5.62121 9.01003 6.17871 8.43753 6.90496 8.43753M5.62121 9.67753H3.74621M6.90496 8.43753V6.56253M6.90496 8.43753H11.3275V6.56253H6.90496M6.90496 6.56253C5.17746 6.56253 3.74621 7.94003 3.74621 9.67753M3.44871 15.055L1.57996 14.8975M11.3262 8.43628C11.4493 8.43628 11.5712 8.41203 11.685 8.36492C11.7987 8.3178 11.9021 8.24875 11.9891 8.16169C12.0762 8.07464 12.1452 7.97129 12.1923 7.85755C12.2395 7.7438 12.2637 7.62189 12.2637 7.49878C12.2637 7.37567 12.2395 7.25376 12.1923 7.14001C12.1452 7.02627 12.0762 6.92292 11.9891 6.83587C11.9021 6.74881 11.7987 6.67976 11.685 6.63264C11.5712 6.58553 11.4493 6.56128 11.3262 6.56128V8.43628Z" stroke="#551B42" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                &nbsp; Unlock free nail art, discounts, and special treats
                </p>
                <p class="flex items-center text-gray-800 text-lg">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.625 16.625C15.375 16 15.375 15.5 15.5 15H3.75V5.625L11.25 10.625L18.75 5.625V7.75C19.5 7.375 20.125 7.375 20.5 7.375C20.625 7.25 20.875 7.125 21.125 7V3.25C21.25 2.125 20.375 1.25 19.25 1.25H3.25C2.125 1.25 1.25 2.125 1.25 3.25V15.5C1.25 16.625 2.125 17.5 3.25 17.5H16.125C15.875 17.25 15.75 17 15.625 16.625ZM18.75 3.75L11.25 8.75L3.75 3.75H18.75ZM28.25 12.375C28 11.625 27.375 11.5 27 11.125C26.75 10.75 26.75 10 26.125 9.625C25.5 9.125 24.875 9.375 24.375 9.25C23.875 9.125 23.5 8.5 22.75 8.5C22 8.5 21.625 9 21.125 9.25C20.625 9.375 20 9.125 19.375 9.625C18.75 10 18.875 10.625 18.5 11.125C18.125 11.5 17.5 11.75 17.25 12.375C17 13.125 17.5 13.625 17.5 14.125C17.5 14.625 17 15.125 17.25 15.875C17.5 16.625 18.125 16.75 18.5 17.125C18.75 17.5 18.75 18.25 19.375 18.625C20 19.125 20.625 18.875 21.125 19C21.625 19.125 22 19.75 22.75 19.75C23.5 19.75 23.875 19.25 24.375 19C24.875 18.875 25.5 19.125 26.125 18.625C26.75 18.125 26.75 17.5 27 17.125C27.375 16.75 28 16.5 28.25 15.875C28.5 15.125 28 14.625 28 14.125C28 13.625 28.5 13.125 28.25 12.375ZM22.75 18C20.625 18 19 16.25 19 14.25C19 12.25 20.75 10.5 22.75 10.5C24.75 10.5 26.5 12.25 26.5 14.25C26.5 16.25 24.875 18 22.75 18ZM24.625 14.125C24.625 15.125 23.75 16 22.75 16C21.75 16 20.875 15.125 20.875 14.125C20.875 13.125 21.75 12.25 22.75 12.25C23.75 12.25 24.625 13.125 24.625 14.125ZM24.375 21.375L23.75 24.75L23 28.625L20.5 26.25L17.5 27.625L18.75 20.5C19.25 20.75 19.875 20.875 20.5 20.875C20.875 21.125 21.375 21.375 21.75 21.5C22 21.625 22.375 21.625 22.75 21.625C23.375 21.75 23.875 21.625 24.375 21.375ZM28.375 24.375L25.875 23.5L26.375 20.75L27.125 20.375L27.25 20.25L28.375 24.375Z" fill="#551B42"/>
                    </svg>

                &nbsp; Exclusive offers just for members
                </p>

                <!-- Button -->
                <button 
                    id="joinNowBtn" 
                    class="mt-6 px-8 py-3 bg-[#922E71] text-white font-medium rounded-md shadow-md hover:bg-pink-800">
                    Join Now
                </button>

            </div>

            
        </div>
    </section>

    <!-- Modal Background -->

<!-- Modal -->
<div id="joinModal" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center hidden z-50">
  <!-- Modal Content -->
  <div class="bg-[#FEEDF8] rounded-lg shadow-xl p-8 w-11/12 max-w-md relative">
    <!-- Close Button -->
    <button id="closeModalBtn" aria-label="Close Modal" class="absolute top-4 right-4 text-[#6D2355] hover:text-[#551B42] text-2xl font-bold">&times;</button>

    <h3 class="text-2xl font-semibold text-[#6D2355] mb-4 text-center">Enter Your Code</h3>
    
    <input
      type="text"
      id="codeInput"
      placeholder="Enter code here"
      class="w-full border border-[#6D2355] rounded-md px-4 py-3 mb-6 text-[#551B42] focus:outline-none focus:ring-2 focus:ring-pink-400 transition"
    />

    <button
      id="verifyBtn"
      class="w-full bg-pink-400 hover:bg-pink-500 text-white font-semibold py-3 rounded-lg transition-colors duration-300"
    >
      Verify
    </button>

    <p id="verifyMessage" class="mt-4 text-center text-sm"></p>
  </div>
</div>

<!-- User Details Modal -->
<div id="detailsModal" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center hidden z-50">
  <div class="bg-[#FEEDF8] rounded-lg shadow-xl p-8 w-11/12 max-w-md relative">
    <button id="closeDetailsModalBtn" aria-label="Close Modal" class="absolute top-4 right-4 text-[#6D2355] hover:text-[#551B42] text-2xl font-bold">&times;</button>
    
    <h3 class="text-2xl font-semibold text-[#6D2355] mb-4 text-center">Enter Your Details</h3>
    
    <input
      type="text"
      id="fullNameInput"
      placeholder="Full Name"
      class="w-full border border-[#6D2355] rounded-md px-4 py-3 mb-4 text-[#551B42] focus:outline-none focus:ring-2 focus:ring-pink-400 transition"
    />
    
    <input
      type="text"
      id="phoneInput"
      placeholder="Phone Number"
      class="w-full border border-[#6D2355] rounded-md px-4 py-3 mb-4 text-[#551B42] focus:outline-none focus:ring-2 focus:ring-pink-400 transition"
    />
    
    <input
      type="email"
      id="emailInput"
      placeholder="Email Address"
      class="w-full border border-[#6D2355] rounded-md px-4 py-3 mb-6 text-[#551B42] focus:outline-none focus:ring-2 focus:ring-pink-400 transition"
    />
    
    <button
      id="submitDetailsBtn"
      class="w-full bg-pink-400 hover:bg-pink-500 text-white font-semibold py-3 rounded-lg transition-colors duration-300"
    >
      Submit
    </button>

    <p id="detailsMessage" class="mt-4 text-center text-sm"></p>
  </div>
</div>


<script>
  const joinNowBtn = document.getElementById('joinNowBtn');
    const joinModal = document.getElementById('joinModal');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const verifyBtn = document.getElementById('verifyBtn');
    const codeInput = document.getElementById('codeInput');
    const verifyMessage = document.getElementById('verifyMessage');

    const detailsModal = document.getElementById('detailsModal');
    const closeDetailsModalBtn = document.getElementById('closeDetailsModalBtn');
    const submitDetailsBtn = document.getElementById('submitDetailsBtn');
    const fullNameInput = document.getElementById('fullNameInput');
    const phoneInput = document.getElementById('phoneInput');
    const emailInput = document.getElementById('emailInput');
    const detailsMessage = document.getElementById('detailsMessage');

    let verifiedCodeId = null; // Store the verified code ID here

    joinNowBtn.addEventListener('click', () => {
    joinModal.classList.remove('hidden');
    codeInput.value = '';
    verifyMessage.textContent = '';
    verifyMessage.className = 'mt-4 text-center text-sm'; // reset message styles

    // reset details modal inputs & message
    fullNameInput.value = '';
    phoneInput.value = '';
    emailInput.value = '';
    detailsMessage.textContent = '';
    detailsMessage.className = 'mt-4 text-center text-sm';
    });

    closeModalBtn.addEventListener('click', () => {
    joinModal.classList.add('hidden');
    });

    joinModal.addEventListener('click', (e) => {
    if (e.target === joinModal) {
        joinModal.classList.add('hidden');
    }
    });

    closeDetailsModalBtn.addEventListener('click', () => {
    detailsModal.classList.add('hidden');
    });

    detailsModal.addEventListener('click', (e) => {
    if (e.target === detailsModal) {
        detailsModal.classList.add('hidden');
    }
    });

    verifyBtn.addEventListener('click', () => {
    const code = codeInput.value.trim();

    if (!code) {
        verifyMessage.textContent = 'Please enter a code.';
        verifyMessage.className = 'mt-4 text-center text-sm text-red-600';
        return;
    }

    fetch("{{ route('loyalty.verify') }}", {
        method: 'POST',
        headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}',
        'Accept': 'application/json',
        },
        body: JSON.stringify({ code })
    })
    .then(async (response) => {
        if (!response.ok) {
        let data = {};
        try { data = await response.json(); } catch(e) {}
        throw new Error(data.message || 'Invalid code. Please try again.');
        }
        return response.json();
    })
    .then(data => {
        if (data.valid) {
        verifyMessage.textContent = 'Code verified! Please enter your details.';
        verifyMessage.className = 'mt-4 text-center text-sm text-green-600';

        verifiedCodeId = data.id;

        // Hide verification modal and show details modal
        joinModal.classList.add('hidden');
        detailsModal.classList.remove('hidden');
        } else {
        verifyMessage.textContent = 'Invalid code. Please try again.';
        verifyMessage.className = 'mt-4 text-center text-sm text-red-600';
        }
    })
    .catch(error => {
        verifyMessage.textContent = error.message;
        verifyMessage.className = 'mt-4 text-center text-sm text-red-600';
    });
    });

    submitDetailsBtn.addEventListener('click', () => {
    const fullName = fullNameInput.value.trim();
    const phone = phoneInput.value.trim();
    const email = emailInput.value.trim();

    // Basic validation
    if (!fullName || !phone || !email) {
        detailsMessage.textContent = 'Please fill out all fields.';
        detailsMessage.className = 'mt-4 text-center text-sm text-red-600';
        return;
    }

    detailsMessage.textContent = '';
    detailsMessage.className = 'mt-4 text-center text-sm';

    fetch("{{ route('loyalty.submit') }}", {
        method: 'POST',
        headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}',
        'Accept': 'application/json',
        },
        body: JSON.stringify({
        id: verifiedCodeId,
        full_name: fullName,
        phone: phone,
        email: email
        })
    })
    .then(async (response) => {
        if (!response.ok) {
        let data = {};
        try { data = await response.json(); } catch(e) {}
        throw new Error(data.message || 'Failed to submit details.');
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
        detailsMessage.textContent = 'Details submitted successfully! Thank you.';
        detailsMessage.className = 'mt-4 text-center text-sm text-green-600';

        // Optionally close modal after a delay
        setTimeout(() => {
            detailsModal.classList.add('hidden');
        }, 2000);
        } else {
        throw new Error('Failed to submit details.');
        }
    })
    .catch(error => {
        detailsMessage.textContent = error.message;
        detailsMessage.className = 'mt-4 text-center text-sm text-red-600';
    });
    });

</script>

<!-- Footer -->
<x-footer />

</body>
</html>
