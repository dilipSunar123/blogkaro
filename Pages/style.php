<?php
    header("Content-type: text/css; charset: UTF-8");
?>

html {
    scroll-behavior: smooth;
}
body {
    margin: 0; padding: 0; box-sizing: border-box;
}
.container-fluid {
    margin-top: 20px;
}
.navbar-nav > .active > a { 
    color: grey; 
    font-weight: bold;
}
.search-items {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: columns;
    margin-top: 10px;
    float: right;
}
.search-items a {
    margin-left: 40px;
    font-size: 28px;
}
.blogs {
    width: 100%;
    height: 50%;
    background-color: #e6edea;
}
.featured-img {
    width: 20vw;
    height: 30vh;
    padding: 10px;
}
.img-blogIcon {
    width: 225px;
    height: 220px;
    float: right;
    margin-top: -170px;
    border-radius: 50%;
    border: 5px solid white;
}
.blog-items {
    width: 100%;
    background-color: grey;
}
.cardOwn {
    display: flex;
    flex-direction: row;
}
.nav-item {
    font-size: 20px;
}
.nav-item:hover {
    font-weight: bold;
}
.userKiBoli {
    margin-top: 7rem;
}
.socialIcons {
    margin-top: 20px;
    display:flex; 
    align-items: center; 
    justify-content: center;
}
.blogUser {
    margin-top: 5rem;
    display: flex;
    align-items: center; 
    justify-content: center;
    flex-direction: center;
}
.footer {
    /* background-color: #bdc3c7; */
    width: 100%;
    height: 30vh;
    margin-top: 16rem;
    display: flex;
    align-items: center;
    justify-content: center;
}
.footer-Img {
    width: 25vw;
    height: 35vh;
}
.copyright {
    margin-top: 4rem;
    background-color: black;
    color: white;
    
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}
.copyright a {
    color: white;
}
.serach-box {
    width: 100%;
    float: right;
}
.list {
    text-decoration: none;
    font-size: 15px;
    color: black;
}
.userKiBoli {
    margin-top: 15rem;
}
.jumbotron {
    padding: 20px;
}
.searchForm {
    display: flex;
    align-items: center;
    <!-- justify-content: center; -->
    flex-direction: column;
}
.contactForm {
    margin-top: 50px;
    <!-- background-color: grey; -->
}
.post-img {
    width: 100%;
    height: 600px;
}
.post {
    width: 100%;
    height: 100vh;
    background-size: 100% 100%;
    margin-top: 5rem;
    display: flex;
    justify-content: center;
}
.card-body {
    display: flex;
    justify-content: center; 
    flex-direction: column;
}
.pen {
    font-size: 4rem;
}
.peopleAlsoRead {
    display: flex;
    align-items: center;
    <!-- justify-content: center; -->
    justify-content: space-around;
    margin-top: 5rem;
}
.read1 {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    <!-- flex-direction: space-between; -->
    background-color: #ccffcc;
    padding: 20px;
} .read1 img {
    width: 260px;
    height: 180px;
}
.content-post {
    background-color: #fff;
    font-size: 19px;
}
.footer-card {
    font-family: "Times New Roman", Times, serif;
    <!-- margin-top: 0rem; -->
}
.footer-card-email {
    font-family: "Times New Roman", Times, serif;    
}
.icons {
    display: flex;
    align-items: center;
    flex-direction: space-around;
    float: right;
    margin-top: -5rem;
    margin-right: 3rem;
}
.icons a {
    color: black; 
    font-size: 25px;
}
.commentForm {
    display: flex;
    justify-content: center;
    margin-top: 20rem;
}
.aboutJumbo {
   background: linear-gradient(to bottom left, #daf4f5 50%, #b0c9cf 50%);
}
.index-jumbo {
    background-color: #e6edea;
}
.user-data {
    display: flex;
    align-items: center;
}
.content-topic {
    display: flex;
    justify-content: center;
    margin-bottom: 10px;
}
.fa-pen-nib {
    font-size: 4rem;
}
.searchForm input {
    width: 15vw;
}
.searchForm button {
    margin-left: 5px;
}
.feel-free {
    margin-top: 30px;
}
.div-handWithPen {
    width: 100%;
}
.index-jumbo {
    margin-top: 5rem;
}
.m-auto {
    margin-top: 30px;
}
.index-featured-articles {
    margin-top: 10rem;
}
.video {
    margin-top: 25rem;
}
.blog-content {
    margin-top: 5rem;
}
.ig {
    color: #d63d7e;
}
.author-info {
    background: linear-gradient(to bottom left, #daf4f5 50%, #b0c9cf);
    height: 50rem;
    display: flex;
    justify-content: flex-start;
    align-items: flex-end;
    
}
.author-details-info {
    width: 100%; 
    display: flex;
    flex-direction: column;
    padding: 40px;
    font-size: 16px;
}
.author-details {
    margin-top: 3rem;
}
.author-icon {
    display: flex;
    align-items: center;
}
.author-icon a {
    font-size: 35px;
}
.author-img {
    width: 23vw;
    padding-right: 15px;
    padding-bottom: 15px;
    margin-bottom: 40px;
}
.scroll {
    font-size: 35px;    
    float: right;
    display: flex;
    justify-content: flex-end;
    margin-top: 47rem;
}
.to-top {
    background: white;
    opacity: 1;
    position: fixed;
    border-radius: 10px;
    background: none;
}
.footerIcons {
    width: 100%; 
    margin-top: -52px;
}
.qrImg {
    margin-left: 4rem;
    cursor: default;
}
.qr {
    
    width: 100%;
    cursor: default;
}
.authorPage-list {
    text-decoration: none;
    color: #000000;
}
.authorPage-list:hover {
    color: #000000;
}
.helpDiv {
    margin-left: 5.5rem;
    margin-top: 6rem;
}
.dropdown {
    margin-top: 7rem;
    float: right;
    cursor: pointer;
    margin-right: 3rem;
}
.faqCard {
    font-size: 17px;
    padding: 20px;
}
.footerList {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: columns;
    margin-top: 15rem;
}
.navbar-toggler {
    margin-top: 5rem;
}