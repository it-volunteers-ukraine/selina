document.addEventListener("DOMContentLoaded",(function(){const e=document.getElementById("showMoreCalendarsButton"),t=document.querySelectorAll(".calendar__calendar-card--hidden");let n=0;e.addEventListener("click",(function(){!function(){for(let e=n;e<n+2&&e<t.length;e++)t[e].style.display="block";n+=2}(),this.blur()}));const l=document.getElementById("showMoreTipsCardsButton"),d=document.querySelectorAll(".beginners-tips__tips-card--hidden");let c=0;l.addEventListener("click",(function(){!function(){for(let e=c;e<c+2&&e<d.length;e++)d[e].style.display="block";c+=2}(),document.querySelectorAll(".beginners-tips__card:nth-child(n+9)").forEach((e=>{e.style.display="flex"})),this.blur()}))}));