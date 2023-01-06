const observer2 = new IntersectionObserver((entries) => {
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

const hiddenElements2 = document.querySelectorAll('.borderhidden');
hiddenElements2.forEach((el) => observer2.observe(el))