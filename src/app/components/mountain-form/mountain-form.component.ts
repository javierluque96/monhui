import { Component, OnInit } from '@angular/core';
import { Mountain } from '../../models/Mountain';
import { Router } from '@angular/router';
import { MountainsService } from 'src/app/services/mountains.service';

@Component({
  selector: 'app-mountain-form',
  templateUrl: './mountain-form.component.html',
  styleUrls: ['./mountain-form.component.scss'],
})
export class MountainFormComponent implements OnInit {
  mountain: Mountain = {
    id: null,
    name: '',
    height: null,
    location: '',
    description: '',
    image: '',
  };

  edit: Boolean = false;

  constructor(private mountainsService: MountainsService, private router:Router) {}

  ngOnInit(): void {}

  addMountain() {
    this.mountainsService.saveMountain(this.mountain).subscribe(
      (res) => {
        console.log(res);
        this.router.navigate(['/mountains']);
      },
      (err) => console.error(err)
    );
  }

  updateMountain() {
    console.log('updating');
  }
}
