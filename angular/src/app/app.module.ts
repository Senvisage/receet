import { BrowserModule }            from '@angular/platform-browser';
import { NgModule }                 from '@angular/core';
import { HttpClientModule }         from '@angular/common/http';
import { AppComponent }             from './app.component';
import { AppRoutingModule }         from './app-routing.module';

import { HeaderComponent }          from './header/header.component';
import { FooterComponent }          from './footer/footer.component';
import { RecettesComponent }        from './recettes/recettes.component';
import { IngredientsComponent }     from './ingredients/ingredients.component';
import { ReceetApiService }         from './receet-api.service';
import { IngredientThumbComponent } from './ingredient-thumb/ingredient-thumb.component';
import { RecetteThumbComponent }    from './recette-thumb/recette-thumb.component';
import { HomeComponent } from './home/home.component';


@NgModule({
  declarations: [
    AppComponent,

    FooterComponent,
    HeaderComponent,
    IngredientsComponent,
    RecettesComponent,
    IngredientThumbComponent,
    RecetteThumbComponent,
    HomeComponent
  ],
  imports: [
    AppRoutingModule,
    BrowserModule,
    HttpClientModule
  ],
  providers: [ReceetApiService],
  bootstrap: [AppComponent]
})
export class AppModule { }
