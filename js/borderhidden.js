const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry)
        if(entry.isIntersecting){
            entry.target.classList.add('showborder');
        }
        else{
            entry.target.classList.remove('showborder');
        }
    });
});

const hiddenElements = document.querySelectorAll('.borderhidden');
hiddenElements.forEach((el) => observer.observe(el))