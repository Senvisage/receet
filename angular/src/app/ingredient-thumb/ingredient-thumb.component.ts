import { Component, OnInit, Input } from '@angular/core';
import { Ingredient }            from '../../entities/ingredient';

@Component({
  selector: 'app-ingredient-thumb',
  templateUrl: './ingredient-thumb.component.html',
  styleUrls: ['./ingredient-thumb.component.css']
})
export class IngredientThumbComponent implements OnInit {
  @Input()
  ingredient: Ingredient;

  constructor() {}

  ngOnInit() {
  }

}
