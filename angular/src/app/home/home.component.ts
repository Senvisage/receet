import { Component, OnInit } from '@angular/core';
import { Recette }            from '../../entities/recette';
import { ReceetApiService }   from '../receet-api.service';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {
  private recettes: Recette[];
  private slideIndex:number;
  private currentSlide: Recette;
  private timePerSlide: number;

  constructor(private receetApiService: ReceetApiService) {}
  ngOnInit() {
    this.currentSlide = null;
    this.getRecettes();

    this.slideIndex = 0;
    this.timePerSlide = 4000;
  }

  getRecettes(): void {
    this.receetApiService.getRecettes()
        .subscribe(
            data => {
              this.recettes = data;
              this.refreshSlide();
            });
  }
  changeDiv(n: number):void {
    this.slideIndex += n;
    if (this.slideIndex >= this.recettes.length) {
      this.slideIndex = 0;
    }
    if (this.slideIndex < 0) {
      this.slideIndex = this.recettes.length-1;
    }
    this.refreshSlide();
  }

  refreshSlide(): void {
    this.currentSlide = this.recettes[this.slideIndex];
  }

}
