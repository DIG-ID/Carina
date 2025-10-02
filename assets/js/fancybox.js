import { Fancybox } from "@fancyapps/ui";

// wait until DOM is ready
document.addEventListener("DOMContentLoaded", () => {
	//wait until images, links, fonts, stylesheets, and js is loaded
	window.addEventListener("load", () => {
    //General fancybox 
    if (document.body.classList.contains("single")) {
      Fancybox.bind('[data-fancybox=open-zimmer]', {
        defaultType: "iframe",
        id: "open-zimmer",
      });
    }
  }, false);
});


