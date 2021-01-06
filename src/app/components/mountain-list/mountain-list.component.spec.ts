import { ComponentFixture, TestBed } from '@angular/core/testing';

import { MountainListComponent } from './mountain-list.component';

describe('MountainListComponent', () => {
  let component: MountainListComponent;
  let fixture: ComponentFixture<MountainListComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ MountainListComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(MountainListComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
