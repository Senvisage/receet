import { Component, OnInit }  from '@angular/core';
import { Ingredient }         from '../../entities/ingredient';
import { ReceetApiService }   from '../receet-api.service';

@Component({
  selector: 'app-ingredients',
  templateUrl: './ingredients.component.html',
  styleUrls: ['./ingredients.component.css']
})
export class IngredientsComponent implements OnInit {
  ingredients: Ingredient[];   // Display the length of an Observable : this.recettes$.subscribe(result => {console.log(result.length)});

  constructor(private receetApiService: ReceetApiService) {}
  ngOnInit(): void {
    this.getIngredients();
  }

  getIngredients(): void {
    this.receetApiService.getIngredients()
        .subscribe(data => this.ingredients = data);
  }
}
