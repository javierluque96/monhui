import { Component, OnInit } from '@angular/core';
import { Mountain } from '../../models/Mountain';
import { ActivatedRoute, Router } from '@angular/router';
import { MountainsService } from 'src/app/services/mountains.service';
import { log } from 'console';

@Component({
  selector: 'app-mountain-form',
  templateUrl: './mountain-form.component.html',
  styleUrls: ['./mountain-form.component.scss'],
})
export class MountainFormComponent implements OnInit {
  public mountain: Mountain = {
    id: null,
    name: '',
    height: null,
    location: '',
    description: '',
    image: '',
  };

  edit: Boolean = false;

  constructor(
    private mountainsService: MountainsService,
    private router: Router,
    private route: ActivatedRoute
  ) {}

  ngOnInit(): void {
    const id = this.route.snapshot.params.id;

    if (id) {
      this.mountainsService.getMountain(id).subscribe(
        (res) => {
          this.mountain = res;
          this.edit = true;
        },
        (err) => {
          console.error(err);
          this.redirect();
        }
      );
      this.edit = true;
    }
  }

  addMountain() {
    this.mountainsService.saveMountain(this.mountain).subscribe(
      (res) => {
        console.log(res);
        this.redirect();
      },
      (err) => console.error(err)
    );
  }

  updateMountain() {
    this.mountainsService
      .updateMountain(this.mountain.id, this.mountain)
      .subscribe(
        (res) => {
          console.log(res);
          this.redirect();
        },
        (err) => console.error(err)
      );
  }

  redirect(url: String = '/mountains') {
    this.router.navigate([url]);
  }
}
