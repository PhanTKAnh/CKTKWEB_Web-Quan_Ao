<section id="header">
        <div class="aspect-ratio-169"> <!------Nhờ đặc tính này nên khi rê chuột vào nó Responsive theo -->
            <img src="images/banner1.jpg">
            <img src="images/banner2.jpg">
            <img src="images/banner3.jpg">
            <img src="images/banner4.jpg">
            <img src="images/banner5.jpg">
        </div>
        <div class="dot-container">
            <div class="dot active"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    
</section>

<script>
    const header = document.querySelector("header")
    window.addEventListener("scroll", function() {
        x = window.pageYOffset //tính toạ độ Y(chiều dọc)
        if(x > 0) { // rê vào màng hình dịch xuống dưới
            header.classList.add("sticky")
        }
        else {
            header.classList.remove("sticky")
        }
    })


    const imgPosition = document.querySelectorAll(".aspect-ratio-169 img")
    // console.log(imgPosition)
    const imgContainer = document.querySelector('.aspect-ratio-169')
    const dotItem = document.querySelectorAll(".dot")
    let imgNuber = imgPosition.length
    let index = 0
    imgPosition.forEach(function(image,index) {
        image.style.left = index*100 + "%"   // dịch chuyển các phần tử 
        dotItem[index].addEventListener("click",function(){
        slider (index) 
        })

    }) 

    function imgSlide () {
        index++;
        console.log(index)
        if(index >= imgNuber) {index = 0}
        slider (index) 
    }

    function slider (index) {
        imgContainer.style.left = "-" +index*100+"%"
        const dotActive = document.querySelector('.active') //chọn hết class active xong r xoá
        dotActive.classList.remove("active")
        dotItem[index].classList.add("active")
    }

    setInterval(imgSlide,5000)
</script>