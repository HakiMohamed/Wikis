if (localStorage.getItem("isSmall") === "yes") {
    SidebarID.classList.add("small-sidebar")
  } else {
    SidebarID.classList.remove("small-sidebar");
  }


const toggleSidebar = () =>{
  
if (localStorage.getItem("isSmall") === "yes") {
localStorage.setItem("isSmall","no");
SidebarID.classList.remove("small-sidebar");
} 

else {
localStorage.setItem("isSmall","yes");
SidebarID.classList.add("small-sidebar");
}

}