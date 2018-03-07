import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {
  private slideIndex:number;
  private slides: HTMLCollectionOf<Element>;
  private currentSlide: Element;
  private timePerSlide: number;

  constructor() {
    private plusDivs = this.plusDivs.bind(this);
  }
  ngOnInit() {
    this.slideIndex = 1;
    this.slides = document.getElementsByClassName("mySlides");
    this.currentSlide = this.slides[this.slideIndex];
    this.timePerSlide = 4000;
    this.showDivs(this.slideIndex);
    this.autoRoll();
  }

  private autoRoll() {
    this.plusDivs(this.slideIndex);
    setTimeout(this.autoRoll, this.timePerSlide);
  }
  private plusDivs(n:number) {
    if(n === undefined)
      n = 1;
    this.showDivs(this.slideIndex += n);
  }
  private showDivs(n) {
    let i;
    if (n > this.slides.length) {this.slideIndex = 1;}
    if (n < 1) {this.slideIndex = this.slides.length;}
    for (i = 0; i < this.slides.length; i++) {
      this.slides[i].style.display = "none";
    }
    this.slides[0].style.display = "block";
  }
}
