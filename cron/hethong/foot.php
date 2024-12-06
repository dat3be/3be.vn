<div id="kt_app_footer" class="app-footer">
							<!--begin::Footer container-->
							<div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
								<!--begin::Copyright-->
								<div>
						ㅤ© Copyright by DichVuMight 
<a href="//www.dmca.com/Protection/Status.aspx?ID=b2aed7c5-2e2e-4342-8448-654748984d22" title="DMCA.com Protection Status" class="dmca-badge"> <img src ="https://images.dmca.com/Badges/dmca_protected_sml_120m.png?ID=b2aed7c5-2e2e-4342-8448-654748984d22"  alt="DMCA.com Protection Status" /></a>  <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>
                          </div>
       <b class="menu menu-gray-600 menu-hover-primary fw-semibold order-1 NgayTao__"><strong class="InfoYou__">Current Time : </strong> <u class=" DateCreater__" id="today"></u></b> 
						</div>
<script>var hostUrl = "/assets/";</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="/assets/plugins/global/plugins.bundle.js"></script>
<script src="/assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)-->
<script src="/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
<script src="/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
<script src="/assets/js/widgets.bundle.js"></script>
<script src="/assets/js/custom/widgets.js"></script>
<script src="/assets/js/custom/apps/chat/chat.js"></script>
<script src="/assets/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="/assets/js/custom/utilities/modals/create-app.js"></script>
<script src="/assets/js/custom/utilities/modals/users-search.js"></script>


<script type="text/javascript"> 
function updateTime() { const now = new Date(); const options = { hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: false, timeZone: 'Asia/Ho_Chi_Minh' }; const timeString = now.toLocaleString('en-US', options); const hours = now.getHours(); let timeOfDay = ''; if (hours >= 5 && hours < 12) { timeOfDay = 'Buổi Sáng 🌞'; } else if (hours >= 12 && hours < 18) { timeOfDay = 'Buổi Chiều 🌒'; } else { timeOfDay = 'Buổi Tối 🌙'; } document.getElementById('today').textContent = `${timeString} ${timeOfDay}`;
}
setInterval(updateTime, 1000);
// TIEU SU TYPE TEXT
let typed = new Typed(".GioiThieu", {
typeSpeed: 95,
backSpeed: 75,
loop: true
})</script> 


    <style>
        ::-webkit-scrollbar {
    width: 8px;
}

html {
    scrollbar-width: thin;
    scrollbar-color: rgba(7, 156, 248) rgba(0, 0, 0, 0);
}

html {
    scrollbar-width: thin;
    scrollbar-color: rgba(7, 156, 248) rgba(0, 0, 0, 0);
}


html {
    scrollbar-width: thin;
    scrollbar-color: rgba(7, 156, 248) rgba(0, 0, 0, 0);
}

* {
    scrollbar-width: thin;
}




#top-menu {
    position: fixed;
    top: 50%;
    right: 0;
    transform: translateY(-50%);
    list-style: none;
    padding: 0;
    margin: 0;
    z-index: 1000;
}

#top-menu li {
    margin: 10px 0;
    display: flex;
    justify-content: flex-end;
}

#top-menu a.menu-item {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background-color: white;
    border-radius: 10px 0 0 10px; /* Adjusted border radius */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    overflow: hidden;
    text-decoration: none;
    color: black;
    transition: width 0.3s;
}

#top-menu a.menu-item span {
    display: none; /* Initially hide the text */
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    margin-left: 10px;
}

#top-menu li.expanded a.menu-item {
    width: 150px;
}

#top-menu li.expanded a.menu-item span {
    display: inline; /* Show text when expanded */
}


.hidden {
    display: none !important;
}




@keyframes slide {
    0% {
        top: -100%;
    }

    50% {
        top: 0%;
    }

    100% {
        top: 100%;
    }
}



@keyframes l27-0 {
    0%, 30% { transform: rotate(0); }
    70% { transform: rotate(120deg); }
    70.01%, 100% { transform: rotate(360deg); }
}

@keyframes l27-1 {
    0% { transform: rotate(calc(var(--s, 1) * 120deg)) translate(0); }
    30%, 70% { transform: rotate(calc(var(--s, 1) * 120deg)) translate(calc(var(--s, 1) * -5px), 10px); }
    100% { transform: rotate(calc(var(--s, 1) * 120deg)) translate(0); }
}
</style> 
<script>
    const toggleMenuButton = document.getElementById('toggle-menu-button');
    const topMenu = document.getElementById('top-menu');
    toggleMenuButton.addEventListener('click', function() {
        topMenu.classList.toggle('hidden');
    });
</script>
</div> 
     <ul id="top-menu"> 
     <li class=""> <a class="menu-item" href="https://facebook.com/datmight.dev"> <i><img width="27" height="27" alt="" src="https://cdn.mypanel.link/4cgr8h/9rjnzbd98rt8s5we.gif"></i> <span style="font-weight:bold;">Facebook</span> </a> </li> 
      <li class=""> <a class="menu-item" href="https://zalo.me/0964705312"> <i><img width="27" height="27" alt="" src="https://cdn.haitrieu.com/wp-content/uploads/2022/01/Logo-Zalo-Arc.png"></i> <span style="font-weight:bold;">Zalo</span> </a> </li> 
      <li class=""> <a class="menu-item" href="https://t.me/dichvumight"> <i><img width="27" height="27" alt="" src="https://cdn.mypanel.link/sw177w/7ea6iam2aygm0qws.gif"></i> <span style="font-weight:bold;">Telegram</span> </a> </li> 
     </ul> 