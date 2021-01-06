import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Mountain } from '../models/Mountain';

@Injectable({
  providedIn: 'root'
})
export class MountainsService {

  API_URI = "http://localhost:8888"

  constructor(private http: HttpClient) { }

  getMountains(): Observable<Mountain> {
    return this.http.get(`${this.API_URI}/api/mountains`);
  }

  getMountain(id: string|number): Observable<Mountain> {
    return this.http.get(`${this.API_URI}/api/mountains/${id}`);
  }

  saveMountain(mountain: Mountain): Observable<Mountain> {
    return this.http.post(`${this.API_URI}/api/mountains`, mountain);
  }

  updateMountain(id: string|number, mountain: Mountain): Observable<Mountain> {
    return this.http.put(`${this.API_URI}/api/mountains/${id}`, mountain);
  }

  deleteMountain(id: string|number): Observable<Mountain> {
    return this.http.delete(`${this.API_URI}/api/mountains/${id}`);
  }
}
