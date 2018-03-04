import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { RecetteThumbComponent } from './recette-thumb.component';

describe('RecetteThumbComponent', () => {
  let component: RecetteThumbComponent;
  let fixture: ComponentFixture<RecetteThumbComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ RecetteThumbComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(RecetteThumbComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
