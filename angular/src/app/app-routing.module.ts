import { NgModule }             from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { HomeComponent }    from './home/home.component';
import { RecettesComponent }    from './recettes/recettes.component';
import { RecetteComponent }    from './recette/recette.component';
import { IngredientsComponent } from './ingredients/ingredients.component';

const routes: Routes = [
  { path: '', component: HomeComponent },
  { path: 'recettes', component: RecettesComponent },
  { path: 'recette/:id', component: RecetteComponent },
  { path: 'ingredients', component: IngredientsComponent }
];

@NgModule({
  imports: [ RouterModule.forRoot(routes) ],
  exports: [ RouterModule ]
})
export class AppRoutingModule {}