"use strict";

export default class DoctorView {
  constructor() {
    this.parentElement = "#doctors";
  }

  template(doctorObj) {
    const html = `
           <a href="/DocWebox/public/views/patient-views/doctor-public-profile.php?id=${doctorObj.id}"><div class="column">
                    <div class="card">
                        <div class="img-container">
                        <img src="${doctorObj.image === "" ? "../../resources/images/pfp/doctor-pfp.png" : "../../../src/resources/profile-images/doctors/" + doctorObj.image}" />
                        </div>
                        <h3>Dr. ${doctorObj.firstname} ${doctorObj.lastname}</h3>
                        <h5>${doctorObj.specialization}</h5>
                        <p>${doctorObj.location}</p>
                        <div class="icons">
                            <a class="icon-link" href="tel:${doctorObj.phone}" target=blank>
                            <i class="fa-solid fa-phone"></i>
                            </a>
                            <a class="icon-link" href="mailto:${doctorObj.email}" target=blank>
                            <i class="fa-solid fa-envelope"></i>
                            </a>
                        </div>
                    </div>
            </div></a>`;

    return html;
  }

  templateEmpty() {
    return `<div class="column">
       <div class="card">
        <h3>No Doctors found</h3>
        </div>
    </div>`;
  }

  render(doctors) {
    const that = this;
    const container = document.querySelector(this.parentElement);

    container.innerHTML = "";

    if (doctors.length >= 1) {
      doctors.forEach(function (doctorObj) {
        container.insertAdjacentHTML("beforeEnd", that.template(doctorObj));
      });
    } else {
      container.insertAdjacentHTML("beforeEnd", this.templateEmpty());
    }
  }
}
