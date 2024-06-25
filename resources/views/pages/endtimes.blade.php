<x-layout>
    <div class="container mx-auto pt-30">
      <div id="intro" class="pt-28 mb-20 px-4">
          <div class="introVideo md:h-auto" id="mainvid">
              <iframe width="560" height="315" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
              <div class="loading-spinner" id="loading-main"></div>
              <video controls class="object-cover w-full absolute top-0" id="endvid">
                <source src="{{asset('images/endtimes.mp4')}}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
          </div>
          <h2 class="text-2xl font-bold mt-6 roboto">The Oracles of God, Chronicles of the End Times</h2>
          {{-- <button class="px-4 py-2 bg-teal-600 rounded download-btn">Download Video</button> --}}
      </div>
          
    </div>
    <div class="container mx-auto">
      <div class="flex justify-center md:justify-between mt-4 mb-10 flex-wrap md:flex-nowrap space-x-4">
          @foreach($categories as $category)
              <button class="px-4 py-2 bg-teal-600 hover:bg-teal-400 text-black roboto rounded categories mt-4" id="category-{{ $category }}" onclick="filterVideos('{{ $category }}')">
                  {{ formatCategoryName($category)}}
              </button>
          @endforeach
      </div>
  
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-20" id="videoContainer">
          @foreach($lectures as $video)
              <div class="border p-4 rounded {{ $video['category'] }} video relative" style="display: none;">
                  <div class="absolute  top-0 bottom-0 h-full w-full left-0 right-0 z-10 cursor-pointer video-trigger">
                  
                  </div>
                  <div class="videoWrapper h-[574px]" >
                      {!! $video['video_link'] !!}
                      <div class="loading-spinner" id="loading-{{ $loop->index }}"></div>
                  </div>
                  <h3 class="text-lg font-bold mt-6 roboto vid-title">{{ $video['name'] }}</h3>
                  
              </div>
              <script>
                  // Hide the spinner after 30 seconds if it's still visible
                  setTimeout(() => hideLoadingSpinner({{ $loop->index }}), 30000);
              </script>
          @endforeach
      </div>
  </div>
  <script async src="https://www.tiktok.com/embed.js"></script>
  <script>
      function filterVideos(category) {
          const videos = document.querySelectorAll('.video');
          videos.forEach(video => {
              if (video.classList.contains(category) || category === 'all') {
                  video.style.display = 'block';
              } else {
                  video.style.display = 'none';
              }
          });
      }
  
      filterVideos('lesson1');
  
      document.getElementById(`category-lesson1`).classList.add('active');
          
      const buttons = document.querySelectorAll('.categories');
      // Loop through each button
      buttons.forEach(button => {
          // Add a click event listener to each button
          button.addEventListener('click', function() {
              // Remove 'active' class from all buttons
              buttons.forEach(btn => btn.classList.remove('active'));
              // Add 'active' class to the clicked button
              this.classList.add('active');
          });
      });
  
      window.hideLoadingSpinner = function (index) {
        const spinner = document.getElementById(`loading-${index}`);
        const spinner2 = document.getElementById(`loading-main`);
        if (spinner) {
            spinner.style.display = 'none';
            spinner2.style.display = 'none';
        }
    };
  
      function scrollToSection(targetId) {
          var targetSection = document.getElementById(targetId);
          if (targetSection) {
          window.scrollTo({
              top: targetSection.offsetTop,
              behavior: 'smooth'
          });
          }
      }
      
      function playMainVid(fullLink) {
          const main = document.getElementById(`mainvid`);
          console.log(fullLink)
          const ifr = main.firstElementChild;
          // main.firstElementChild.setAttribute("src", source);
          ifr.setAttribute('src', fullLink);
  
          
      }
      function chageMaintext(label) {
          const main = document.getElementById(`mainvid`);
          main.nextElementSibling.innerText = label;
          checkTitle();
      }
  
  
      const videoContainer4 = document.querySelectorAll('.video-trigger');
  
      videoContainer4.forEach(button => {
          // Add a click event listener to each button
          button.addEventListener('click', function(e) {
              e.preventDefault();
              const source = this.parentNode.children[1].children[0].attributes.src;
  
              const source2 = this.parentNode.children[2];
              console.log(source2);
  
              source2.classList.add("active");
              const label = source2.innerText;
              console.log(label)
              const fullLink = source.value+'?autoplay=1';
              console.log(fullLink);
              playMainVid(fullLink);
              chageMaintext(label);
              scrollToSection('intro');

              const end = document.getElementById(`endvid`);
              end.style.display = 'none';
              const mainvid = document.getElementById(`mainvid`);
              mainvid.style.height = '574px';
  
          });
  
          
      });
       function checkTitle() {
          const main = document.getElementById(`mainvid`);
          const mainlabel = main.nextElementSibling.innerText;
  
          const vidlabel = document.querySelectorAll('.vid-title');
          vidlabel.forEach(label => {
              if(label.innerText != mainlabel && label.classList.contains('active')) {
                  label.classList.remove("active");
              }
          })
       }
       
  
  
  </script>
  </x-layout>