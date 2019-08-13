import {Service} from "./service";

export class ToolchainAPI {
    set putService(service) {
        if (service instanceof Service) {
            throw new Error('Cannot put non-service object');
        }

        const payload = service.toArray();

        axios.post(`/service/${service.slug}`, payload)
            .then(function (response) {
                console.log(response);
            })
            .catch(function (error) {
                console.log(error);
            });
    }
}
