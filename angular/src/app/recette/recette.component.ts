import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';

import { Recette }            from '../../entities/recette';
import { ReceetApiService }   from '../receet-api.service';

@Component({
  selector: 'app-recette',
  templateUrl: './recette.component.html',
  styleUrls: ['./recette.component.css']
})
export class RecetteComponent implements OnInit {
  recette: Recette;

  constructor(private receetApiService: ReceetApiService, private route: ActivatedRoute,) {}
  ngOnInit(): void {
    this.recette = null;
    const id = +this.route.snapshot.paramMap.get('id');
    this.getRecette(id);
  }

  getRecette(id:number): void {
    this.receetApiService.getRecette(id)
        .subscribe(data => this.recette = data);
  }

}
