import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CakesoftComponent } from './cakesoft.component';

describe('CakesoftComponent', () => {
  let component: CakesoftComponent;
  let fixture: ComponentFixture<CakesoftComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CakesoftComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CakesoftComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
