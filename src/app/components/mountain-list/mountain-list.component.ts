import { Component, OnInit } from '@angular/core';
import { MountainsService } from 'src/app/services/mountains.service';

@Component({
  selector: 'app-mountain-list',
  templateUrl: './mountain-list.component.html',
  styleUrls: ['./mountain-list.component.scss'],
})
export class MountainListComponent implements OnInit {
  constructor(private mountainsService: MountainsService) {}
  public mountains: any = [];

  ngOnInit(): void {
    this.getMountains();
  }

  getMountains() {
    this.mountainsService.getMountains().subscribe(
      (res) => {
        this.mountains = res;
      },
      (err) => console.error(err)
    );
  }

  deleteGame(id: string) {
    this.mountainsService.deleteMountain(id).subscribe(
      (res) => {
        this.getMountains();
        console.log(res);
      },
      (err) => console.error(err)
    );
  }
}
