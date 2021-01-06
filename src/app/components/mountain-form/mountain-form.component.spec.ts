import { ComponentFixture, TestBed } from '@angular/core/testing';

import { MountainFormComponent } from './mountain-form.component';

describe('MountainFormComponent', () => {
  let component: MountainFormComponent;
  let fixture: ComponentFixture<MountainFormComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ MountainFormComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(MountainFormComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
