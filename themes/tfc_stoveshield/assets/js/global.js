// overlay js------------------
const overlay = document.querySelector(".overlay");
function addOverlay(){
    overlay.classList.add("open");
}
function removeOverlay(){
    overlay.classList.remove("open");
}

// Search modal js
document.addEventListener('DOMContentLoaded', () => {
    const search_icon = document.querySelector(".main_row_header .serach_icon");
    const search_modal = document.getElementById("search_modal");
    const close_icon = document.querySelector(".close_icon");
    
    
    search_icon.addEventListener("click", () => {
        search_modal.classList.add("open_modal");
        addOverlay();
    });

    close_icon.addEventListener("click", () => {
        search_modal.classList.remove("open_modal");
        removeOverlay();
    });

    overlay.addEventListener("click",()=>{
        search_modal.classList.remove("open_modal");
        removeOverlay();
    });

});


document.addEventListener('DOMContentLoaded', () => {

  const decreaseBtns = document.querySelectorAll('.decreaseBtn');
  const increaseBtns = document.querySelectorAll('.increaseBtn');
  const quantitySpans = document.querySelectorAll('.quantity');

  let quantity = 0;

  decreaseBtns.forEach(decreaseBtn => {
    decreaseBtn.addEventListener('click', () => {
      if (quantity > 0) {
        quantity--;
        updateQuantity();
      }
    });
  });

  increaseBtns.forEach(increaseBtn => {
    increaseBtn.addEventListener('click', () => {
      quantity++;
      updateQuantity();
    });
  });

  function updateQuantity() {
    quantitySpans.forEach(quantitySpan => {
      quantitySpan.textContent = quantity;
    });
  }

});



// Global Faq Accordion js----------------
document.addEventListener('DOMContentLoaded', () => {
  const accordions = document.querySelectorAll(".accordion .tab");

  accordions.forEach(accordion => {
    const content = accordion.querySelector(".content");
    const svgs = accordion.querySelector(".accordion .tab_title svg");
    accordion.addEventListener("click", () => {
      content.classList.toggle("open");
      svgs.classList.toggle("opensvg");
    });
  });
});



// Mobile Offcanvas modal js-------------------
document.addEventListener('DOMContentLoaded', () => {
const open_modal = document.getElementById("hamburger");
const mobile_offcanvas = document.querySelector(".mobile_offcanvas");
const close_modal = document.getElementById("offcavas_modal_close");

open_modal.addEventListener("click",()=>{
  mobile_offcanvas.classList.add("open_offcanvas_modal");
  addOverlay();
});

overlay.addEventListener("click",()=>{
  mobile_offcanvas.classList.remove("open_offcanvas_modal");
});

close_modal.addEventListener("click",()=>{
  mobile_offcanvas.classList.remove("open_offcanvas_modal");
  removeOverlay();
});

});



// F A Q js------------------------------
document.addEventListener('DOMContentLoaded', () => {
  const faq_quick_links = document.querySelectorAll(".flex_column li");
  faq_quick_links.forEach(faq_quick_link => {
      faq_quick_link.addEventListener("click", () => {
          faq_quick_links.forEach(link => {
              link.classList.remove("faq-link-open");
          });
          faq_quick_link.classList.add("faq-link-open");
      });
  });
});




// add_to_cart_section js------------------------
const popupModal = document.querySelector('.add_to_cart_popup_modal');
const triggerHeight = 1371;

function handleScroll() {
    const scrollPosition = window.scrollY || window.pageYOffset;

    if (scrollPosition >= triggerHeight) {
        popupModal.style.opacity = '1';
        popupModal.style.visibility = 'visible';
    } else {
        popupModal.style.opacity = '0';
        popupModal.style.visibility = 'hidden';
    }
}
window.addEventListener('scroll', handleScroll);
popupModal.style.transition = 'opacity 0.3s ease, visibility 0.3s ease';



