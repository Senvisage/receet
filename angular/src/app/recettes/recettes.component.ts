import { Component, OnInit }  from '@angular/core';
import { Recette }            from '../../entities/recette';
import { ReceetApiService }   from '../receet-api.service';

@Component({
  selector: 'app-recettes',
  templateUrl: './recettes.component.html',
  styleUrls: ['./recettes.component.css']
})
export class RecettesComponent implements OnInit {
  recettes: Recette[];
  constructor(private receetApiService: ReceetApiService) {}
  ngOnInit(): void {
    this.getRecettes();
  }

  rerollHandler(recette: any): void {

    this.receetApiService.getRecetteRandom()
        .subscribe(
            (data) => {
              const index: number = this.recettes.indexOf(recette);
              this.recettes.splice(index, 1, data);
            });
  }

  getRecettes(): void {
    this.receetApiService.getRecettes()
        .subscribe(data => this.recettes = data);
  }
}
