import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { IngredientThumbComponent } from './ingredient-thumb.component';

describe('IngredientThumbComponent', () => {
  let component: IngredientThumbComponent;
  let fixture: ComponentFixture<IngredientThumbComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ IngredientThumbComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(IngredientThumbComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
