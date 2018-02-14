import { TestBed, inject } from '@angular/core/testing';

import { LogiServiceService } from './logi-service.service';

describe('LogiServiceService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [LogiServiceService]
    });
  });

  it('should be created', inject([LogiServiceService], (service: LogiServiceService) => {
    expect(service).toBeTruthy();
  }));


  
});
