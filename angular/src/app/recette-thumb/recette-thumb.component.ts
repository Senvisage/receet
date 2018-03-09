import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { Recette }            from '../../entities/recette';

@Component({
  selector: 'app-recette-thumb',
  templateUrl: './recette-thumb.component.html',
  styleUrls: ['./recette-thumb.component.css']
})
export class RecetteThumbComponent implements OnInit {
  @Output()
  public onreroll:EventEmitter<any> = null;

  @Input()
  recette: Recette;

  constructor() {
    this.onreroll = new EventEmitter<any>();
  }
  ngOnInit() {}

  rerollRecette() {
    this.onreroll.emit(this.recette);
  }
}
