import { TestBed, inject } from '@angular/core/testing';

import { ReceetApiService } from './receet-api.service';

describe('ReceetApiService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [ReceetApiService]
    });
  });

  it('should be created', inject([ReceetApiService], (service: ReceetApiService) => {
    expect(service).toBeTruthy();
  }));
});
