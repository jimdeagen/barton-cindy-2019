import $ from "jquery";

class MobileMenu {
  constructor() {
    this.siteHeader = $(".site-header");
    this.menuIcon = $(".site-header__menu-icon");
    this.menuContent = $(".site-header__menu-content");
    this.menuLink = $('li a[id$="-link"]');
    this.events();
  }

  events() {
    this.menuIcon.click(this.toggleTheMenu.bind(this));
    this.menuLink.click(this.toggleTheMenu.bind(this));
  }

  toggleTheMenu() {
    this.menuContent.toggleClass("site-header__menu-content--is-visible");
    this.menuLink.toggleClass("site-header__menu-content--is-visible");
    this.siteHeader.toggleClass("site-header--is-expanded");
    this.menuIcon.toggleClass("site-header__menu-icon--close-x");
  }
}

export default MobileMenu;
