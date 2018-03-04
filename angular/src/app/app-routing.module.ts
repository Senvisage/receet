import { NgModule }             from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { RecettesComponent }    from './recettes/recettes.component';
import { IngredientsComponent } from './ingredients/ingredients.component';

const routes: Routes = [
  { path: '', component: RecettesComponent },
  { path: 'recettes', component: RecettesComponent },
  { path: 'ingredients', component: IngredientsComponent }
];

@NgModule({
  imports: [ RouterModule.forRoot(routes) ],
  exports: [ RouterModule ]
})
export class AppRoutingModule {}