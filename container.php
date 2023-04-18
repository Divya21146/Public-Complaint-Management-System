.container{
   position: relative;
   min-height: 100vh;
   background:#ddd;
   }

   .container .image-container{
    display: flex;
    flex-wrap: wrap;
    gap:15px;
    justify-content: center;
    padding:10px;
}

.container .image-container . image{
    height:250px;
    width:350px;
    border:10px solid #fff;
    box-shadow: 0 5px 15px Orgba(0,8,0,,1);
    overflow:hidden;
    cursor:pointer;
    }

container .image-container . image img{
   height:100%;
   width:100%;
    object-fit: cover;
    transition: .2s linear;
    }

.container .image-container .image:hover img{
    transform: scale(1.1);
    }

.container .popup-image{

position:fixed;
top:0;
left:0;
background:rbga(0,0,0,.9);
 height:100%;
   width:100%;
   z-index:100;
   display:none;
   }

.container .popup-image span{
   
position: absolute;
top:0; right:10px;
font-size: 40px;
font-weight:bolder;
colour:#fff;
cursor:pointer;
z-index:100;

}

.container .popup-image img {
position: absolute;
top: 50%; left: 50%;
transform: translate(-50%,
border: 5px solid #fff;
border-radius: 5px;
width: 750px;
object-fit: cover;
}

@media (max-width:768px){
container .popup-image img{
width: 95%;
}


