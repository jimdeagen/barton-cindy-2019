import MobileMenu from "./modules/MobileMenu";
import RevealOnScroll from "./modules/RevealOnScroll";
import $ from "jquery";
import StickyHeader from "./modules/StickyHeader";
import Modal from "./modules/Modal";
import Modal2 from "./modules/Modal2";

var mobileMenu = new MobileMenu();
new RevealOnScroll($(".feature-item"), "75%");
new RevealOnScroll($(".achiever"), "75%");
var stickyHeader = new StickyHeader();
var modal = new Modal();
var modal2 = new Modal2();
