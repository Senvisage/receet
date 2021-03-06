import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs/Observable';
import { of } from 'rxjs/observable/of';
import { catchError, map, tap } from 'rxjs/operators';

import { Recette } from '../entities/recette';
import { Ingredient } from '../entities/ingredient';

const httpOptions = {
  headers: new HttpHeaders({ 'Content-Type': 'application/json' })
};

@Injectable()
export class ReceetApiService {
  private apiUrl = 'http://localhost/receet/symfony/public/api/';

  constructor(private http: HttpClient) { }
  private handleError<T> (operation = 'operation', result?: T) {
    return (error: any): Observable<T> => {
      console.error(error);
      return of(result as T);
    };
  }

  getRecettes(): Observable<Recette[]> {
    return this.http.get<Recette[]>(this.apiUrl + `recette`).pipe(
        catchError(this.handleError<Recette[]>('getRecettes', [])));
  }
  getRecette(id: number): Observable<Recette> {
    return this.http.get<Recette>(this.apiUrl + `recette/` + id).pipe(
        catchError(this.handleError<Recette>('getRecette:' + id, null)));
  }
  getRecetteRandom(): Observable<Recette> {
    return this.http.get<Recette>(this.apiUrl + `recette/random`).pipe(
        catchError(this.handleError<Recette>('getRecetteRandom', null)));
  }

  deleteRecette(recette: Recette | number): Observable<Recette> {
    const id = typeof recette === 'number' ? recette : recette.id;
    return this.http.delete<Recette>(this.apiUrl + `recette/` + id, httpOptions).pipe(
        catchError(this.handleError<Recette>('deleteRecette'))
    );
  }

  getIngredients(): Observable<Ingredient[]> {
    return this.http.get<Ingredient[]>(this.apiUrl + `ingredient`).pipe(
        catchError(this.handleError<Ingredient[]>('getIngredients', [])));
  }
}
