import $ from "jquery";

class Modal {
  constructor() {
    this.openModalButton = $(".open-modal");
    this.openModal2Button = $(".open-modal-2");
    this.modal = $(".modal");
    // this.modal2 = $(".modal-2");
    this.closeModalButton = $(".modal__close");
    // this.closeModal2Button = $(".modal-2__close");
    this.events();
  }

  events() {
    // clicking the open modal button
    this.openModalButton.click(this.openModal.bind(this));

    // clicking the open modal button
    this.openModal2Button.click(this.openModal.bind(this));

    // clicking the x close modal button
    this.closeModalButton.click(this.closeModal.bind(this));

    // clicking the x close modal button
    // this.closeModal2Button.click(this.closeModal2.bind(this));

    // pushes any key
    $(document).keyup(this.keyPressHandler.bind(this));
  }

  keyPressHandler(e) {
    if (e.keyCode == 27) {
      this.closeModal();
    }
  }

  openModal() {
    this.modal.addClass("modal--is-visible");
    return false;
  }

  // openModal2() {
  //   this.modal2.addClass("modal-2--is-visible");
  //   console.log("modal 2");
  //   return false;
  // }

  closeModal() {
    this.modal.removeClass("modal--is-visible");
  }

  // closeModal2() {
  //   this.modal2.removeClass("modal-2--is-visible");
  // }
}

export default Modal;
