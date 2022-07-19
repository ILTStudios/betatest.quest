const image_input = document.querySelector('#file');
const image_div = document.querySelector('.image')

image_input.addEventListener('change', () => {
    const reader = new FileReader();
    reader.addEventListener('load', () => {
        //big boy display image
        const image = reader.result;
        image_div.style.backgroundImage = `url(${image})`;

        //big boy save iamge
        localStorage.setItem('profile-picture', image);
    });
    reader.readAsDataURL(this.file.files[0]);
});

//load big boy saved iamge
document.addEventListener("DOMContentLoaded", () => {
    const profile_picture_url = localStorage.getItem("profile-picture");

    if (profile_picture_url){
        image_div.style.backgroundImage = `url(${profile_picture_url})`;
    }
});